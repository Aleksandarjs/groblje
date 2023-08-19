<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Helper;

class TextController extends Controller
{
    private $model, $route, $title, $pics;

    public function __construct()
    {
        $this->model = 'App\Models\Text';
        $this->route = 'texts';
        $this->title = 'app.texts';   
        $this->pics = array('app.image' => 'image');    
    }

    public function index()
    {
        return view('cms.'.$this->route.'.list', ['route' => $this->route, 'title' => __($this->title)]);
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'action'
        );

        $sortable = [0, 1];

        $sqlRec = $this->model::query();

        $search = $request['search']['value'];
        if(!empty($search) && !is_null($search) && is_string($search) && $search!="") {
            $sqlRec->where(function($q) use ($search) {
                $q->whereRaw("(title like ?)", ["%$search%"]);
            });
        }
        
        $totalRecords = $sqlRec->count();

        $order = $request['order'];
        if(!empty($order) && !is_null($order) && is_array($order))
            foreach($order as $key => $value) {
                if(in_array($value['column'], $sortable) && ($value['dir'] == "asc" || $value['dir'] == "desc"))
                    $sqlRec->orderBy($columns[$value['column']], $value['dir']);
            }
        
        $length = (intval($request['length']) > 0) ? intval($request['length']) : 10;
        $start = intval($request['start']);
        $rows = $sqlRec->take($length)->skip($start)->get();
        
        foreach($rows as $row) {
            $data[] = [
                '0' => $row->id,
                '1' => $row->title,
                '2' => '<a href="'.url('cms/'.$this->route.'/'.$row->id.'/edit').'" class="btn_action"><img src="'.asset('cmsfiles/images/btn_edit.jpg').'" alt="bt_edit">
                </a>'
            ];
        }
        
        $json_data = array(
                    "draw"            => intval($request['draw']),  
                    "recordsTotal"    => intval($totalRecords),  
                    "recordsFiltered" => intval($totalRecords), 
                    "data"            => $data   
                    );
            
        return json_encode($json_data);
    }

    public function create()
    {
        foreach($this->pics as $key => $i){
            $width[$i] = 1;
            $height[$i] = 1;
        }

        return view('cms.'.$this->route.'.form', ['item' => new $this->model(), 'editing' => false, 'route' => $this->route, 'title' => __($this->title), 'pics' => $this->pics, 'width' => $width, 'height' => $height,]);
    }

    public function store(Request $request)
    {
        foreach($this->pics as $key => $i){
            $image[$i] = null;
            if($request->hasFile($i)) $image[$i] = Helper::saveImage($request->$i, $this->route, $request->title);

            $array[$i] = $image[$i];
        }
        
        $item = $this->model::create(array_merge([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'telefon' => $request->telefon,
            'description' => $request->description,
            'url' => $request->url,
            'urltitle' => $request->urltitle, 
        ], $array));
        
        return redirect('cms/'.$this->route);
    }

    public function edit($id)
    {
        foreach($this->pics as $key => $i){
            $width[$i] = 0;
            $height[$i] = 0;
        }

        if($id==1) {
            $width['image'] = 255;
            $height['image'] = 108;
        } else if ($id==4) {
            $width['image'] = 68;
            $height['image'] = 69;
        } else if ($id==5) {
            $width['image'] = 83;
            $height['image'] = 57;
        } else if ($id==6) {
            $width['image'] = 138;
            $height['image'] = 138;
        } else if ($id==7) {
            $width['image'] = 1168;
            $height['image'] = 691;
        } else if ($id==8) {
            $width['image'] = 469;
            $height['image'] = 470;
        } else if ($id==9) {
            $width['image'] = 152;
            $height['image'] = 153;
        } else if ($id==11) {
            $width['image'] = 1920;
            $height['image'] = 840;
        } else if ($id==13) {
            $width['image'] = 172;
            $height['image'] = 166;
        }

        return view('cms.'.$this->route.'.form', ['item' => $this->model::findOrFail($id), 'editing' => true, 'route' => $this->route, 'title' => __($this->title), 'width' => $width, 'height' => $height, 'pics' => $this->pics]);
    }

    public function update(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);
        
        foreach($this->pics as $key => $i){
            $width[$i] = 0;
            $height[$i] = 0;
        }
        if($id==1) {
            $width['image'] = 255;
            $height['image'] = 108;
        } else if ($id==4) {
            $width['image'] = 68;
            $height['image'] = 69;
        } else if ($id==5) {
            $width['image'] = 83;
            $height['image'] = 57;
        } else if ($id==6) {
            $width['image'] = 138;
            $height['image'] = 138;
        }

        if($item->title === null) $request->merge(['title' => null]);
        if($item->subtitle === null) $request->merge(['subtitle' => null]);
        if($item->telefon === null) $request->merge(['telefon' => null]);
        if($item->description === null) $request->merge(['description' => null]);
        if($item->url === null) $request->merge(['url' => null]);
        if($item->urltitle === null) $request->merge(['urltitle' => null]);
        if($item->image === null) $request->merge(['image' => null]);

        if($item->title !== null && $request->title === null) $request->merge(['title' => '']);
        if($item->subtitle !== null && $request->subtitle === null) $request->merge(['subtitle' => '']);
        if($item->telefon !== null && $request->telefon === null) $request->merge(['telefon' => '']);
        if($item->description !== null && $request->description === null) $request->merge(['description' => '']);
        if($item->url !== null && $request->url === null) $request->merge(['url' => '']);
        if($item->urltitle !== null && $request->urltitle === null) $request->merge(['urltitle' => '']);
        if($item->image !== null && $request->image === null) $request->merge(['image' => '']);


        $request->validate([
            'title' => ['nullable', 'string', 'max:191'],
            'subtitle' => ['nullable', 'string', 'max:191'],
            'telefon' => ['nullable', 'string', 'max:191'],
            'description' => ['nullable', 'string'],
            'url' => ['nullable', 'required_with:urltitle', 'string', 'max:191'],
            'urltitle' => ['nullable', 'required_with:url', 'string', 'max:191'],
            'image' => ['nullable', 'mimes:jpeg,png,svg', 'image', 'max:5000', 'dimensions:min_width='.$width['image'].',min_height='.$height['image']],
        ]);    


        foreach($this->pics as $key => $i){
            $image[$i] = $item[$i];
            if($request->hasFile($i)) $image[$i] = Helper::saveImage($request->$i, $this->route, $item->title, $image[$i]);
            else if($item->title != $item->title && !is_null($image[$i])) $image[$i] = Helper::renameImage($image[$i], $this->route, $item->title);
            
            $item[$i] = $image[$i];
        }

        $item->title = $request->title;
        $item->subtitle = $request->subtitle;
        $item->telefon = $request->telefon;
        $item->description = $request->description;
        $item->url = $request->url;
        $item->urltitle = $request->urltitle;

        $item->save();

        Cache::forget('texts-'.$item->id);

        session()->flash('success', __('app.success'));

        return redirect('cms/'.$this->route);
    }

    public function removeImage(Request $request, $id)
    {
        foreach($this->pics as $key => $i){
            $checkArray[] = $i;
        }
        
        $checkArray = implode(",", $checkArray);

        $request->validate([
            'image' => ['required', 'in:'.$checkArray],
        ]);

        $item = $this->model::findOrFail($id);

        if(Helper::deleteImage($item[$request->image])) {
            $item[$request->image] = null;
            $item->save();
        } else {
            return back()->withErrors(__('app.error'));
        }

        Cache::forget('texts-'.$item->id);

        session()->flash('success', __('app.success'));
        return back();
    }

}
