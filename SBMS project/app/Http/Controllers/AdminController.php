<?php

namespace App\Http\Controllers;

use App\Models\areaModel;
use App\Models\SchoolModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use App\Models\BusDriverModel;
use RealRashid\SweetAlert\Facades\Alert;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class AdminController extends Controller
{

    public function schooldetails()
    {

        $school = SchoolModel::all();
        return view('admindashboard/AdminDashboard', compact('school'));

    }

    public function Schooldelete($ID)
    {
        $sdelete = SchoolModel::where('School_id', $ID)->delete();
        Alert::success('Record Deleted');

        return redirect()->back();
    }


    // Student Fetch Work
    public function adminstudentsdetails()
    {

        $student = StudentModel::select('student_models.Student_id', 'student_models.Student_full_name', 'student_models.Father_name', 'student_models.Student_class', 'student_models.Student_age', 'student_models.Parents_number', 'student_models.Student_Email', 'student_models.Student_Password', 'area_models.Areaname')
            ->join('area_models', 'student_models.Fk_area', '=', 'area_models.Area_Id')
            ->get();
        return view('admindashboard/allstudentsdetails', compact('student'));

    }

    // Student Delete Work
    public function Studentdelete($record)
    {
        $stdelete = StudentModel::where('Student_id', $record)->delete();
        Alert::success('Record Deleted');

        return redirect()->back();
    }


    public function DriverAdd(request $req)
    {
        $driver = new BusDriverModel();
        $input = $req->all();

        $this->validate($req, [
            'dname' => 'required|string',
            'dphoneno' => 'required|max:10',
            'DvCnic' => 'required|max:13',
            'dlicence' => 'required|max:13',
            'dage' => 'required',
            'gender' => 'required',
            'password' => 'required'
        ]);
        $driver->Driver_Id = "1" . mt_rand(10000, 99999);
        $driver->BusDriverName = $req->dname;
        $driver->BusDriverPhoneNumber = $req->dphoneno;
        $driver->BusDriverCNICNumber = $req->DvCnic;
        $driver->BusDriverLicense = $req->dlicence;
        $driver->Age = $req->dage;
        $driver->Gender = $req->gender;
        $driver->Area_Fk_Id = $req->driverareainp;



        if ($req->hasFile('driverimg')) {
            $image = $req->file('driverimg');
            $imagefile = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imagefile);
            $driver->image = $imagefile;
        }

        $driver->save();

        $this->update_user_Onfirebase($driver, $req->password);
        Alert::success('Driver Added!');



        return redirect()->back();

    }

    public function driverdetails()
    {

        $driver = BusDriverModel::select('bus_driver_models.Driver_Id', 'bus_driver_models.BusDriverName', 'bus_driver_models.BusDriverPhoneNumber', 'bus_driver_models.BusDriverCNICNumber', 'bus_driver_models.BusDriverLicense', 'bus_driver_models.age', 'bus_driver_models.image', 'bus_driver_models.Gender', 'area_models.Areaname')
            ->join('area_models', 'bus_driver_models.Area_Fk_Id', '=', 'area_models.Area_Id')
            ->get();
        return view('admindashboard/alldriverdetails', compact('driver'));

    }

    public function DriverGetAreas()
    {
        $dareas = areaModel::all();
        return json_encode($dareas);
    }

    // Driver Delete Work
    public function Driverdelete($record)
    {
        $dvdelete = BusDriverModel::where('Driver_Id', $record)->delete();
        Alert::success('Record Deleted');

        return redirect()->back();
    }

    function driversearch(Request $req)
    {
        $input = $req->search;


        if ($input != "") {
            $expression = "%" . $input . "%";
            $driver = BusDriverModel::where("Driver_Id", "like", $expression)->get();
            return view('admindashboard/alldriverdetails', compact('driver'));
        } else {
            return redirect("/alldriver")->with("searchfielderror", "searchfield is empty");
        }
    }





    public function update_user_Onfirebase($driver, $pass)
    {
        //Create User ON Firebase Database

        $firebase = (new Factory)
            ->withServiceAccount(__DIR__ . '/crude-4b299-firebase-adminsdk-fw6pk-a8c90beabc.json')
            ->withDatabaseUri(env("FirebaseDb_url"));

        $database = $firebase->createDatabase();


        $database->getReference('Users')
            ->push([
                'id' => $driver->Driver_Id,
                'name' => $driver->BusDriverName,
                'email' => $driver->BusDriverName . "@Bconnect.com",
                'gender' => $driver->Gender,
                'type' => "driver",
                'password' => $pass,
            ]);
    }


}