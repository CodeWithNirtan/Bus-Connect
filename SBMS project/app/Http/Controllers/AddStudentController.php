<?php

namespace App\Http\Controllers;

use App\Models\BusModel;
use App\Models\StudentModel;


use Illuminate\Http\Request;
use App\Models\BusSeatReservation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class AddStudentController extends Controller
{
    public function add(Request $req)
    {


        // $this->validate($req, [
        //     'St_name' => 'required|string',
        //     'Fk_Parent_id' => 'required|string',
        //     'St_class' => 'required',
        //     'St_age' => 'required|string',
        //     'St_ph_num' => 'required|string|max:10',
        //     'St_email' => 'required|string|email',
        //     'St_password' => 'required|string',
        //     'areainp' => 'required',
        //     'businp' => 'required',
        //     'busseatinp' => 'required'
        // ], [
        //     'St_name.required' => 'The student name field is required.',
        //     'Fk_Parent_id.required' => 'The parent ID field is required.',
        //     'St_class.required' => 'The student class field is required.',
        //     'St_age.required' => 'The student age field is required.',
        //     'St_ph_num.required' => 'The phone number field is required.',
        //     'St_ph_num.max' => 'The phone number may not be greater than 10 characters.',
        //     'St_email.required' => 'The email address field is required.',
        //     'St_email.email' => 'Please enter a valid email address.',
        //     'St_password.required' => 'The password field is required.',
        //     'areainp.required' => 'The area input field is required.',
        //     'businp.required' => 'The bus input field is required.',
        //     'busseatinp.required' => 'The bus seat input field is required.'
        // ]);
        try {
            $student = new StudentModel();
            $student->Student_id = "1" . mt_rand(10000, 99999);
            $student->Student_full_name = $req->St_name;
            $student->Student_class = $req->St_class;
            $student->Student_age = $req->St_age;
            $student->Parents_number = $req->St_ph_num;
            $student->Student_Email = $req->St_email;
            $student->Student_Password = $req->St_password;
            $student->Fk_Parent_id = $req->Fk_Parent_id;
            $student->Fk_area = $req->areainp;
            $student->Fk_bus = $req->businp;
            $student->Fk_bus_seat = $req->seatid;

            $input = $req->all();



            $student->save();



            //update user object on firebase


            // update Seat id once booked
            $id = $req->seatid;
            $busseatreservation = BusSeatReservation::findOrFail($req->seatid);

            $busseatreservation->update([
                'IsBooked' => 1,
            ]);


            // push records on firebase

            //Create User ON Firebase Database
         
                $firebase = (new Factory)
                    ->withServiceAccount(__DIR__ . '/crude-4b299-firebase-adminsdk-fw6pk-a8c90beabc.json')
                    ->withDatabaseUri(env("FirebaseDb_url"));

                $database = $firebase->createDatabase();


                $database->getReference('Reservations')
                    ->push([
                            'Parent_id' => $student->Fk_Parent_id,
                            'Bus_id' => $student->Fk_bus,
                        ]);










            Alert::success('Student Registered Successfully');
            return redirect()->back();

        } catch (\Exception $e) {
            // Handle the exception here
            // You can log the error, display a user-friendly message, or take any necessary actions.
            // For example, you can use Laravel's Log facade to log the error:
            // \Log::error($e);


            // Display an error message to the user
            Alert::error($e->getMessage());


            // Redirect the user back to the form with an error message
            return redirect()->back();
        }
    }


    public function studentsdetails()
    {

        $student = StudentModel::select('student_models.Student_id', 'student_models.Student_full_name', 'student_models.Father_name', 'student_models.Student_class', 'student_models.Student_age', 'student_models.Parents_number', 'student_models.Student_Email', 'student_models.Student_Password', 'area_models.Areaname')
            ->join('area_models', 'student_models.Fk_area', '=', 'area_models.Area_Id')
            ->get();
        return view('schooldashboard/detailsofstudents', compact('student'));

    }

    // fetch work 
    public function schoolbusdetails()
    {
        $buss = BusModel::all();
        return view('schooldashboard/detailsofbuses', compact('buss'));
    }

    function studentsearch(Request $req)
    {
        $input = $req->search;


        if ($input != "") {
            $expression = "%" . $input . "%";
            $student = StudentModel::where("Student_id", "like", $expression)->get();
            return view('schooldashboard/detailsofstudents', compact('student'));
        } else {
            return redirect("/detailsofstudent")->with("searchfielderror", "searchfield is empty");
        }
    }
}