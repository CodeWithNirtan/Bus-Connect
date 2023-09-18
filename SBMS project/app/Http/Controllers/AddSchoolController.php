<?php

namespace App\Http\Controllers;

use DB;
use App\Models\areaModel;
use App\Models\SchoolModel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AddSchoolController extends Controller
{
    public function index(Request $req)
    {
        $schoolname=$req->SchName;
        $schoolphone=$req->SchoolPhoneNum;
        $schoolpass=$req->SchPassword;
        $schoolemail=$req->SchEmail;
        $schoolprincipalname=$req->PrincipleName;
        $schoolareaid=$req->schoolareainp;


$school=new SchoolModel();
 $school->School_id="1".mt_rand(10000,99999);
 $school->SchoolName=$schoolname;
$school->SchoolPhoneNumber=$schoolphone;
$school->SchoolPassword=Hash::make($schoolpass);
$school->SchoolPrincipalName=$schoolprincipalname;
$school->SchoolEmail=$schoolemail;
$school->Fk_Area_Id=$schoolareaid;

$addsch = new User();
$addsch->name=$schoolname;
$addsch->email=$schoolemail;
$addsch->password=Hash::make($schoolpass);
$addsch->type=1;

$input = $req->all();

$this->validate($req, [
    'SchName' => 'required|string',
    'PrincipleName' => 'required|string',
    'SchoolPhoneNum' => 'required|string|max:10',
    'schoolareainp' => 'required',
    'SchEmail' => 'required|string|email',
    'SchPassword' => 'required|min:8'
]);

$addsch->save();



$school->save();
Alert::success('School Registered Successfully');
return redirect()->back();
}


public function schooldetails(){

    $school=SchoolModel::select('school_models.School_id','school_models.SchoolName', 'school_models.SchoolPrincipalName', 'school_models.SchoolPhoneNumber', 'school_models.SchoolEmail', 'school_models.SchoolPassword', 'area_models.Areaname')
    ->join('area_models', 'school_models.Fk_Area_Id', '=', 'area_models.Area_Id')
    ->get();
return view('admindashboard.allschooldetails',compact('school'));

}

function schoolsearch(Request $req)
{
        $input = $req->search;


        if($input != "")
        {
               $expression = "%".$input."%";
               $school = SchoolModel::where("School_id","like",$expression)->get();
               return view('admindashboard/allschooldetails',compact('school'));
        }
        else
        {
            return redirect("/detailsofstudent")->with("searchfielderror","searchfield is empty");
        }
}

public function SchoolGetAreas()
{
    $areas = areaModel::all();
    return json_encode($areas);
}

}
