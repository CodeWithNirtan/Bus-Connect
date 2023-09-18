<?php

namespace App\Http\Controllers;

use App\Models\BusModel;
use App\Models\BusSeatReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Kreait\Firebase;
use Kreait\Firebase\Factory;


class BusController extends Controller
{

    public function AddBus(Request $req)
    {
        $numberplate = DB::table('bus_models')->where('Bus_number_plate', $req->busPlate)->first();

        if ($numberplate) {
            Alert::warning('Already Bus Entered');
            return redirect()->back();


        } else {
            $Bus = new BusModel();
            $Bus->Bus_Id = "1" . mt_rand(10000, 99999);
            $Bus->owner_name = $req->ownerName;
            $Bus->CNIC = $req->busownercnic;
            $Bus->Owner_phone_number = $req->ownerNum;
            $Bus->Bus_number_plate = $req->busPlate;
            $Bus->Fk_areaid = $req->areainp;
            $Bus->Seats = $req->SeatsInput;
            $Bus->Driver_id = $req->driverinp;

            $no_ofseats = $Bus->Seats;

            $input = $req->all();

            //number of seats form user input


            // $this->validate($req, [
            //     'ownerName' => 'required|string',
            //     'busownercnic' => 'required|string|max:13',
            //     'busPlate' => 'required|string|max:7',
            //     'ownerNum' => 'required|string|max:10',
            //     'areainp' => 'required',
            //     'driverinp' => 'required'
            // ]);

            $Bus->save();



            for ($i = 1; $i <= $no_ofseats; $i++) {

                $seats = new BusSeatReservation();
                $seats->BusSeatNumber = $i;
                $seats->Fk_Bus_ID = $Bus->Bus_Id;
                $seats->IsBooked = false;
                $seats->save();
            }



            $this->update_departure_Onfirebase($Bus, $req->driverinp);

            Alert::success('Bus Added Successfully');

            return redirect()->back();

        }

    }

    public function update_departure_Onfirebase($Bus, $driver_id)
    {
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__ . '/crude-4b299-firebase-adminsdk-fw6pk-a8c90beabc.json')
            ->withDatabaseUri(env("FirebaseDb_url"));

        $database = $firebase->createDatabase();


        $database->getReference('Departure')
            ->push([
                'Driver_id' => $driver_id,
                'Bus_id' => $Bus->Bus_Id,
                'Longitude' => "null",
                'Latitude' => "null",
                'Date_time' => "null",
                'velocity' => "null"
            ]);

    }

    // fetch work 
    public function busdetails()
    {
        $buss = BusModel::all();
        return view('Admindashboard/allbusesdetails', compact('buss'));
    }
    // Delete Work
    public function Busdelete($record)
    {
        $bdelete = BusModel::where('Bus_Id', $record)->delete();
        Alert::success('Record Deleted');

        return redirect()->back();
    }

    function bussearch(Request $req)
    {
        $input = $req->search;


        if ($input != "") {
            $expression = "%" . $input . "%";
            $buss = BusModel::where("Bus_Id", "like", $expression)->get();
            return view('admindashboard/allbusesdetails', compact('buss'));
        } else {
            return redirect("/allbus")->with("searchfielderror", "searchfield is empty");
        }
    }



}