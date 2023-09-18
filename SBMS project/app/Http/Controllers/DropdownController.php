<?php

namespace App\Http\Controllers;

use App\Models\BusModel;
use App\Models\areaModel;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use App\Models\BusDriverModel;
use App\Models\BusSeatReservation;

class DropdownController extends Controller
{
    // public function getBusesByArea($Area_Id)
    // {
    //     $buses = BusModel::where('Fk_areaid', $Area_Id)->get();
    //     return response()->json($buses);
    // }

    public function GetAreas()
    {
        $area = areaModel::all();
        return json_encode($area);
    }

    public function getBusesByArea($Area_Id)
    {
        $buses = BusModel::where('Fk_areaid', $Area_Id)->get();
        return json_encode($buses);
    }

    public function getSeatsByBuses($Bus_Id)
    {
        $seats = BusSeatReservation::where('Fk_Bus_ID',$Bus_Id)->get();
        return json_encode($seats);
    }

        public function getDriversByArea($Area_Id)
    {
        $drivers = BusDriverModel::where('Area_Fk_Id',$Area_Id)->get();
        return json_encode($drivers);
    }


    public function checkParentName($name)
    {
        $parent = ParentModel::find($name);
        
        return json_encode($parent);
    }

}
