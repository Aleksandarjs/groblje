<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cache;

class HcijsonController extends Controller
{
    private $lng, $cuid, $member, $FahrzeugTyp;

    public function __construct()
    {
        $this->lng = 'de';
        $this->cuid = 1399405;
        $this->member = 1399405;
        $this->FahrzeugTyp = 10;
    }

    public function hcitypeone(Request $request, $id)
    {
        if(isset($request->id) && intval($request->id)!=0) {
            $id = intval($request->id);
        } else abort(404);    
      
        $json = Cache::remember('json-car-'.$id, '3600', function() use ($id) {
            return file_get_contents('https://www.autoscout24.ch/api/hci/v3/json/Vehicles/'.urlencode($id).'?lng='.$this->lng.'&cuid='.urlencode($this->cuid).'&member='.urlencode($this->member));
        });

        $car = json_decode($json);
    
      //   $idLista = $_SESSION['idLista'];
      //   $Previous = $idLista[array_search($id, $idLista) - 1];
      //     $Next = $idLista[array_search($id, $idLista) + 1];

      return view('detail', ['car' => $car]); 
    }

    public function hcitypetwo(Request $request)
    {
        $json = file_get_contents('https://www.autoscout24.ch/api/hci/v3/json/metadata/vehicletypes/'.urlencode($this->FahrzeugTyp).'/parameters?cuid='.urlencode($this->cuid).'&member='.urlencode($this->member));
    
        $obj = json_decode($json);
    
        $make = array();
        foreach ($obj[7]->Options as $value) {
            $make[$value->Value] = $value->Label_DE;
        }
    
        $model = array(); 
        foreach ($obj[8]->Options as $value) {
            $model[$value->OptionFilters[1]->OptionValue][$value->Value] = $value->Label_DE;
        }
    }

    public function hcitypethree(Request $request)
    {
        //GET PARAMETERS

        $json = Cache::remember('json-params-'.$this->cuid, '3600', function(){
            return file_get_contents('https://www.autoscout24.ch/api/hci/v3/json/metadata/vehicletypes/'.urlencode($this->FahrzeugTyp).'/parameters?cuid='.urlencode($this->cuid).'&member='.urlencode($this->member));
        });
    
        $obj = json_decode($json);
    
        $sort = array();
        foreach ($obj[4]->Options as $value)
            $sort[$value->Value] = $value->Label_DE;
    
        $fuel = array();
        foreach ($obj[11]->Options as $value) {
            $fuel[$value->Value]['value'] = $value->Label_DE;
            $fuel[$value->Value]['sub'] = false;
            if(isset($value->SubOptions)) {
                foreach($value->SubOptions as $valueSub) {
                    $fuel[$valueSub->Value]['value'] = $valueSub->Label_DE;
                    $fuel[$valueSub->Value]['sub'] = true;
                }
            }
        }
    
        $antrieb = array();
        foreach ($obj[13]->Options as $value)
            $antrieb[$value->Value] = $value->Label_DE;
    
        $trans = array();
        foreach ($obj[12]->Options as $value) {
            $trans[$value->Value]['value'] = $value->Label_DE;
            $trans[$value->Value]['sub'] = false;
            foreach($value->SubOptions as $valueSub) {
                $trans[$valueSub->Value]['value'] = $valueSub->Label_DE;
                $trans[$valueSub->Value]['sub'] = true;
            }
        }
    
        $typ = array();
        foreach ($obj[10]->Options as $value)
            $typ[$value->Value] = $value->Label_DE;
    
        $conditions = array();
        foreach ($obj[17]->Options as $value) {
            $conditions[$value->Value]['value'] = $value->Label_DE;
            $conditions[$value->Value]['sub'] = false;
            foreach($value->SubOptions as $valueSub) {
                $conditions[$valueSub->Value]['value'] = $valueSub->Label_DE;
                $conditions[$valueSub->Value]['sub'] = true;
            }
        }
    
        $make = array();
        foreach ($obj[7]->Options as $value)
            $make[$value->Value] = $value->Label_DE;
    
        $model = array();
        foreach ($obj[8]->Options as $value)
            $model[$value->OptionFilters[1]->OptionValue][$value->Value] = $value->Label_DE;
        //GET PARAMETERS - END
    
    
        //GET CARS - START
        $additionalParameters = '';
        $cacheName = 'json-cars-'.$this->cuid;

        if (isset($_GET['make']) && array_key_exists(intval($_GET['make']), $make)) {
            $additionalParameters .= '&make='.intval($_GET['make']);
            $Make = intval($_GET['make']);
            $cacheName .= '-'.$Make;
        } else {
            $Make = -1;
        }
    
        if ($Make != -1 && isset($_GET['model']) && array_key_exists(intval($_GET['model']), $model[$Make])) {
            $additionalParameters .= '&model='.intval($_GET['model']);
            $Model = intval($_GET['model']);
            $cacheName .= '-'.$Model;
        } else {
            $Model = -1;
        }
    
        if (isset($_GET['cond']) && array_key_exists(intval($_GET['cond']), $conditions)) {
            $additionalParameters .= '&cond='.intval($_GET['cond']);
            $Cond = intval($_GET['cond']);
            $cacheName .= '-'.$Cond;
        } else {
            $Cond = -1;
        }
    
        if (isset($_GET['typ']) && array_key_exists(intval($_GET['typ']), $typ)) {
            $additionalParameters .= '&body='.intval($_GET['typ']);
            $Typ = intval($_GET['typ']);
            $cacheName .= '-'.$Typ;
        } else {
            $Typ = -1;
        }
    
        if (isset($_GET['trans']) && array_key_exists(intval($_GET['trans']), $trans)) {
            $additionalParameters .= '&trans='.intval($_GET['trans']);
            $Trans = intval($_GET['trans']);
            $cacheName .= '-'.$Trans;
        } else {
            $Trans = -1;
        }
    
        if (isset($_GET['drive']) && array_key_exists(intval($_GET['drive']), $antrieb)) {
            $additionalParameters .= '&drive='.intval($_GET['drive']);
            $Antrieb = intval($_GET['drive']);
            $cacheName .= '-'.$Antrieb;
        } else {
            $Antrieb = -1;
        }
    
        if (isset($_GET['fuel']) && array_key_exists(intval($_GET['fuel']), $fuel)) {
            $additionalParameters .= '&fuel='.intval($_GET['fuel']);
            $Fuel = intval($_GET['fuel']);
            $cacheName .= '-'.$Fuel;
        } else {
            $Fuel = -1;
        }
    
        if (isset($_GET['sort']) && array_key_exists($_GET['sort'], $sort)) {
            $additionalParameters .= '&sort='.$_GET['sort'];
            $Sort = $_GET['sort'];
            $cacheName .= '-'.$Sort;
        } else {
            $Sort = -1;
        }
    
        if (isset($_GET['kmto']) && intval($_GET['kmto'])!=0) {
            $additionalParameters .= '&kmto='.intval($_GET['kmto']);
            $KmTo = intval($_GET['kmto']);
            $cacheName .= '-'.$KmTo;
        } else {
            $KmTo = '';
        }
    
        if (isset($_GET['ccmto']) && intval($_GET['ccmto'])!=0) {
            $additionalParameters .= '&ccmto='.intval($_GET['ccmto']);
            $CcmTo = intval($_GET['ccmto']);
            $cacheName .= '-'.$CcmTo;
        } else {
            $CcmTo = '';
        }
    
        if (isset($_GET['priceto']) && intval($_GET['priceto'])!=0) {
            $additionalParameters .= '&priceto='.intval($_GET['priceto']);
            $PriceTo = intval($_GET['priceto']);
            $cacheName .= '-'.$PriceTo;
        } else {
            $PriceTo = '';
        }
    
        if (isset($_GET['page']) && intval($_GET['page'])!=0) {
            $page = intval($_GET['page']);
            $cacheName .= '-'.$page;
        } else
            $page = 1;
    
       
        $json = Cache::remember('json-cars-'.$this->cuid.'-'.$cacheName, '3600', function() use ($additionalParameters, $page){
            return  file_get_contents('https://www.autoscout24.ch/api/hci/v3/json/Vehicles/summaries?vehtyp='.htmlspecialchars($this->FahrzeugTyp).'&cuid='.urlencode($this->cuid).'&member='.urlencode($this->member).'&page='.urlencode($page).'&ItemsPerPage=100&lng='.$this->lng.''.$additionalParameters);
        });
    
        $obj = json_decode($json);
    
        $total = $obj->TotalMatches;
        // $page = $obj->CurrentPage;
        // $pages = $obj->TotalPages;
        // $prevlink = ($page > 1) ? '<li class="page-item"><a class="page-link" href="fahrzeuge.php?'.queryBuild('page', $page-1).'#result"><</a></li>' : '';
        // $nextlink = ($page < $pages) ? '<li class="page-item"><a class="page-link" href="fahrzeuge.php?'.queryBuild('page', $page+1).'#result">></a></li>' : '';
        //GET CARS - END
    
    
        //GET SINGLE CARS - START
        $cars = array();
        foreach ($obj->Vehicles as $car) {
            $json = file_get_contents($car->Url);
            array_push($cars, json_decode($json));
        }
        //GET SINGLE CARS - END
    
        //NEXT, PREVIOUS and BACK
    
        $idLista = array();
    
        // for($i = 1; $i <= ceil($total / 100); $i++) {
          
        //     $json = file_get_contents('https://www.autoscout24.ch/api/hci/v3/json/Vehicles/summaries?vehtyp='.htmlspecialchars($this->FahrzeugTyp).'&cuid='.urlencode($this->cuid).'&member='.urlencode($this->member).'&page='.urlencode($i).'&ItemsPerPage=10&lng='.$this->lng.''.$additionalParameters);
        // }
    
        // $obj = json_decode($json);
        // foreach ($obj->Vehicles as $vehicle) {
        //     array_push($idLista, $vehicle->Id);
        // }
        
        // session()->put('idLista', $idLista);
        // session()->put('zuruck', url());

        return view('fahrzeugangebot', [
            'cars' => $cars,
            'sort' => $sort,
            'fuel' => $fuel,
            'antrieb' => $antrieb,
            'trans' => $trans,
            'typ' => $typ,
            'conditions' => $conditions,
            'make' => $make,
            'model' => $model,
            'Make' => $Make,
            'Model' => $Model,
            'Cond' => $Cond,
            'Typ' => $Typ,
            'Trans' => $Trans,
            'Antrieb' => $Antrieb,
            'Fuel' => $Fuel,
            'Sort' => $Sort,
            'KmTo' => $KmTo,
            'CcmTo' => $CcmTo,
            'PriceTo' => $PriceTo,
            'page' => $page,
            'total' => $total
        ]); 
    }
    
    public function hcitypefour(Request $request, $id)
    {
        if(isset($request->id) && intval($request->id)!=0) {
            $id = intval($request->id);
        } else abort(404);    
      
        $json = Cache::remember('json-car-'.$id, '3600', function() use ($id) {
            return file_get_contents('https://www.autoscout24.ch/api/hci/v3/json/Vehicles/'.urlencode($id).'?lng='.$this->lng.'&cuid='.urlencode($this->cuid).'&member='.urlencode($this->member));
        });

        $car = json_decode($json);

        $Standard = array();
        $Optional = array();

        foreach ($car->Equipment->EurotaxEquipment->Comfort->StandardItems as $standard) {
            array_push($Standard, $standard);
        }

        foreach ($car->Equipment->EurotaxEquipment->Technic->StandardItems as $standard) {
            array_push($Standard, $standard);
        }

        foreach ($car->Equipment->EurotaxEquipment->Security->StandardItems as $standard) {
            array_push($Standard, $standard);
        }

        foreach ($car->Equipment->EurotaxEquipment->Misc->StandardItems as $standard) {
            array_push($Standard, $standard);
        }

        foreach ($car->Equipment->EurotaxEquipment->Comfort->OptionalItems as $optional) {
            array_push($Optional, $optional);
        }

        foreach ($car->Equipment->EurotaxEquipment->Technic->OptionalItems as $optional) {
            array_push($Optional, $optional);
        }

        foreach ($car->Equipment->EurotaxEquipment->Security->OptionalItems as $optional) {
            array_push($Optional, $optional);
        }

        foreach ($car->Equipment->EurotaxEquipment->Misc->OptionalItems as $optional) {
            array_push($Optional, $optional);
        }

      return view('ausstattung', ['Optional' => $Optional, 'Standard' => $Standard]); 
    }
}
