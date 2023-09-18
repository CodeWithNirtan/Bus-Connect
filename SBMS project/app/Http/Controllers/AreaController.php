<?php

namespace App\Http\Controllers;

use App\Models\areaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AreaController extends Controller
{



public function AreaAdd(Request $req)
{

    $areaalreadyentered=DB::table('area_models')->where('AreaName', $req->areaname)->first();

    if($areaalreadyentered  ){
        Alert::warning('Area Already Entered');
    return redirect()->back();
    }

    else{
    $area=new areaModel();
    $area->Area_Id="1".mt_rand(10000,99999);
    $area->Areaname=$req->areaname;
    $this->validate($req, [
        'areaname' => 'required|string',
    ]);

$area->save();
Alert::success('Area Added Successfully');
return redirect()->back();
    }
    }
    public function GetAreas()
    {
        $area = areaModel::all();
        return json_encode($area);
    }
}
