<?php

namespace App\Helpers;

use Auth;
use Cache;
use Image;
use Session;
use Exception;
use Carbon\Carbon;
use App\Models\Text;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Helper {

    public static function texts($id)
    {
        return Cache::rememberForever('texts-'.$id, function() use ($id) {
            return Text::find($id);
        });
    }

    public static function facebook()
    {
            $limit = 3;

            $pageId = '100156222899307';
            // $pageId = '1042248072470847';
            $access_token = 'EAAcpjOCt3NwBAIYyIwPkf7ZAQ1ZCvqHw4lSCA5nwh9Pfe5AEfFCEUqE5BPyP7jsTKqRDnkrH7TcnyGudZBClu9umCEmiH7o5qBaahiNQU345pFKVoKCpFdvZBoMn2tWmIxssigXK4vnZARk6JFnlGGSFT0CY9GXJLf7vGIhTN8pwfbZAzgjAI2';
            $url = "https://graph.facebook.com/v10.0/$pageId/feed?fields=created_time,message,story,id,attachments{url,type,media.limit(1),subattachments.limit(1)}&limit=".urlencode($limit)."&access_token=$access_token";
            try {
                $result = file_get_contents($url);
                $decoded = json_decode($result, true);
            } catch (Exception $e) {
                $decoded = [];
            }
            

            $link = array();
            $slika = array();
            $datum = array();
            $tekst = array();

            $br = 0;
            
            foreach($decoded['data'] ?? [] as $post) {
                if(isset($post["message"]))
                    $poruka = Helper::excerpt($post["message"]);
                else
                    $poruka = '';

                $postid = $post['id'];

                $posttime = strftime('%d / %m / %G', strtotime($post["created_time"]));

                if(isset($post['attachments']['data'][0]['media']['image']['src']))
                    $postslika = $post['attachments']['data'][0]['media']['image']['src'];
                else if(isset($post['attachments']['data'][0]['subattachments']['data'][0]['media']['image']['src']))
                    $postslika = $post['attachments']['data'][0]['subattachments']['data'][0]['media']['image']['src'];
                else
                    $postslika = asset('assets/images/image-4.jpg');

                array_push($slika, $postslika);
                array_push($datum, $posttime);
                array_push($tekst, $poruka);
                array_push($link, "https://facebook.com/".$postid);
            }

            $countFacebook = count($link);

            $json = array();
            for($i=0;$i<$countFacebook;$i++) {
                $tmp = array('link' => $link[$i], 'title' => 'Facebook', 'tekst' => $tekst[$i], 'datum' => $datum[$i], 'slika' => $slika[$i]);
                array_push($json, $tmp);
            }

            return $json;

        }
        
    public static function getJson($pp = null)
    {
        if(is_null($pp)) {
            $perPage = 30;
        } else {
            $perPage = $pp;
        }

        return Cache::remember('json-topangebot-'.$perPage , '300', function() use ($perPage) {

            $cuid = 1399405;
            $member = 1399405;
            $lng = 'de';
            $FahrzeugTyp = 10;
            $cars = array();

            $json = file_get_contents('https://www.autoscout24.ch/api/hci/v3/json/Vehicles/summaries?vehtyp='.htmlspecialchars($FahrzeugTyp).'&cuid='.urlencode($cuid).'&member='.urlencode($member).'&page=1&ItemsPerPage='.urlencode($perPage).'&lng='.$lng.'');

            $obj = json_decode($json);
            $total = $obj->TotalMatches;

            foreach ($obj->Vehicles as $car) {
            $json = file_get_contents($car->Url);
            $json = json_decode($json);

            $price = $json->Price;
            $oldPrice = null;

            foreach($json->PriceHistory as $historyPrice) {
                if(is_null($oldPrice)) $oldPrice = $historyPrice->Price;
                else if($historyPrice->Price >= $oldPrice) $oldPrice = $historyPrice->Price;
            }
            if(!is_null($oldPrice) && $oldPrice > $price) $discount = round((1 - $price / $oldPrice) * 100);
            else $discount = '';
            if(!is_null($oldPrice) && $oldPrice > $price) $oldPrice = '<span> '.number_format($oldPrice, 0, '', '\'').'</span>';
            else $oldPrice = '';

            if($discount!="") array_push($cars, array('id' => $json->Id, 'title' => $json->TypeNameFull, 'price' => $price, 'oldPrice' => $oldPrice, 'discount' => $discount, 'image' => ($json->ImagesCount) ? htmlspecialchars($json->Images->L[0]) : 'https://cas01.autoscout24.ch/-/?640x2048/3/90/custom/default/noimage.jpg'));
            }

            return $cars;

        });
    
    }

    public static function image($path = null, $width = null, $height = null)
    {
        if(is_null($path) || $path == "") return null;
        
        if(Str::startsWith($path, url(''))) $path = trim(str_replace(url(''), '', $path), '/');

        $replace = 'storage';
        $path = trim($path, '/');
        if(Str::startsWith($path, $replace)) $path = trim(substr($path, strlen($replace)), '/');

        $width = intval($width) > 5000 ? 0 : intval($width);
        $height = intval($height) > 5000 ? 0 : intval($height);

        if(($width == 0 || $height == 0) && Storage::exists('public/'.$path)) return asset('storage/'.$path);
        if(Storage::exists('public/'.$path)) {
            if(Str::lower(pathinfo($path, PATHINFO_EXTENSION)) === "svg") return asset('storage/'.$path);

            if($width > 0 && $height > 0 && Storage::exists('public/cache/'.$width.'x'.$height.'/'.$path)) return asset('storage/cache/'.$width.'x'.$height.'/'.$path);
            if($width > 0 && $height > 0) {
                try {
                    $originalImage = Image::make(Storage::get('public/'.$path));                

                    if($width == 5000 && $height < 5000) Storage::put('public/cache/'.$width.'x'.$height.'/'.$path, $originalImage->resize(null, $height, function ($constraint) {$constraint->aspectRatio();$constraint->upsize();})->encode()->__toString());
                    else if($height == 5000 && $width < 5000) Storage::put('public/cache/'.$width.'x'.$height.'/'.$path, $originalImage->resize($width, null, function ($constraint) {$constraint->aspectRatio();$constraint->upsize();})->encode()->__toString());
                    else Storage::put('public/cache/'.$width.'x'.$height.'/'.$path, $originalImage->fit($width,$height)->encode()->__toString());
                    
                    if(Storage::exists('public/cache/'.$width.'x'.$height.'/'.$path)) return asset('storage/cache/'.$width.'x'.$height.'/'.$path);
                } catch (Exception $e) {}

                return asset('storage/'.$path);
            }
        }
        return null;
    }

    public static function deleteImage($oldImage)
    {
        try {
            if(is_null($oldImage)) return false;
            
            if(Storage::exists('public/'.$oldImage)) Storage::delete('public/'.$oldImage);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function renameImage($oldImage, $folder, $title)
    {
        try {
            if($title === "" || !is_string($title)) $title = Str::random(40);

            $time = time();
            $date = date('d-m-Y');
            $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'.'.pathinfo($oldImage, PATHINFO_EXTENSION);
            $br = 2;
            while(Storage::exists('public/'.$folder.'/'.$date.'/'.$filename)) {
                $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'-'.$br.'.'.pathinfo($oldImage, PATHINFO_EXTENSION);
                $br++;
            }

            Storage::move('public/'.$oldImage, 'public/'.$folder.'/'.$date.'/'.$filename);

            return $folder.'/'.$date.'/'.$filename;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function saveImage($image, $folder, $title, $oldImage = null)
    {
        try {
            if(!is_null($oldImage) && Storage::exists('public/'.$oldImage)) Storage::delete('public/'.$oldImage);

            if($title === "" || !is_string($title)) $title = Str::random(40);

            $time = time();
            $date = date('d-m-Y');
            $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'.'.$image->getClientOriginalExtension();
            $br = 2;
            while(Storage::exists('public/'.$folder.'/'.$date.'/'.$filename)) {
                $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'-'.$br.'.'.$image->getClientOriginalExtension();
                $br++;
            }

            if(Str::lower($image->getClientOriginalExtension()) === "svg") {
                $image->storeAs('public/'.$folder.'/'.$date, $filename);

                return $folder.'/'.$date.'/'.$filename;
            }

            $image = Image::make($image);
            Storage::put('public/'.$folder.'/'.$date.'/'.$filename, $image->resize(2560, null, function ($constraint) {$constraint->aspectRatio();$constraint->upsize();})->encode()->__toString());

            return $folder.'/'.$date.'/'.$filename;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function saveFile($file, $folder, $title, $oldFile = null, $withoutDate = false)
    {
        try {
            if(!is_null($oldFile) && Storage::exists('public/'.$oldFile)) Storage::delete('public/'.$oldFile);

            if($title === "" || !is_string($title)) $title = Str::random(40);

            $time = time();
            $date = $withoutDate ? '' : '/'.date('d-m-Y');
            $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'.'.$file->getClientOriginalExtension();

            $br = 2;
            while(Storage::exists('public/'.$folder.$date.'/'.$filename)) {
                $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'-'.$br.'.'.$file->getClientOriginalExtension();
                $br++;
            }
            $file->storeAs('public/'.$folder.$date, $filename);

            return $folder.$date.'/'.$filename;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function renameFile($oldFile, $folder, $title)
    {
        try {
            if($title === "" || !is_string($title)) $title = Str::random(40);

            $time = time();
            $date = date('d-m-Y');
            $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'.'.pathinfo($oldFile, PATHINFO_EXTENSION);
            $br = 2;
            while(Storage::exists('public/'.$folder.'/'.$date.'/'.$filename)) {
                $filename = $time.'_'.Str::limit(Str::slug($title), 100, '').'-'.$br.'.'.pathinfo($oldFile, PATHINFO_EXTENSION);
                $br++;
            }

            Storage::move('public/'.$oldFile, 'public/'.$folder.'/'.$date.'/'.$filename);

            return $folder.'/'.$date.'/'.$filename;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function deleteFile($oldFile)
    {
        try {
            if(is_null($oldFile)) return false;
            
            if(Storage::exists('public/'.$oldFile)) Storage::delete('public/'.$oldFile);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function excerpt($value, $words = 10, $end = '...')
    {
        $value = preg_replace('/\s+/', ' ', str_replace([PHP_EOL, '\n', '\r'], ' ', strip_tags(html_entity_decode(str_replace('&nbsp;', ' ', $value), ENT_QUOTES, 'UTF-8'))));
        return Str::words($value, $words, $end);
    }
}