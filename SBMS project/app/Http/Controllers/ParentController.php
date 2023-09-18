<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class ParentController extends Controller
{
    public function Create()
    {
        return view("ParentViews.CreateView");
    }



    public function CreatePost(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:parent_models'],
            'contact_number' => 'required|string|max:11',
            'Residential_address' => 'required|string|max:100',
            'password' => ['required', 'string', 'min:8'],
            'gender' => 'required'
        ]);

        try {
            // Generate a unique custom ID based on the parent's name and 5 random digits
            $parent_id = $this->generateCustomParentID($req->name);

            $Parent = new ParentModel();

            $Parent->id = $parent_id;
            $Parent->name = $req->name;
            $Parent->email = $req->email;
            $Parent->Residential_address = $req->Residential_address;
            $Parent->contact_number = $req->contact_number;
            $Parent->password = $req->password;
            $Parent->gender = $req->gender;

            $Parent->save();


            //Create User ON Firebase Database
            if ($Parent->save()) {
                $firebase = (new Factory)
                    ->withServiceAccount(__DIR__ . '/crude-4b299-firebase-adminsdk-fw6pk-a8c90beabc.json')
                    ->withDatabaseUri(env("FirebaseDb_url"));

                $database = $firebase->createDatabase();

                $blog = $database
                    ->getReference('Users');
                $database->getReference('Users')
                    ->push([
                            'id' => $parent_id,
                            'name' => $req->name,
                            'email' => $req->email,
                            'gender' => $req->gender,
                            'type' => "parent",
                            'password' => $req->password,
                        ]);



                // echo '<pre>';
                // print_r($database
                // ->getReference('blog')->getvalue());
                // echo '</pre>';
            }





        } catch (Exception $ex) {
            dd($ex);
        }

    }


    private function generateCustomParentID($parentName)
    {
        // Generate 5 random digits
        $randomDigits = mt_rand(10000, 99999);

        // Concatenate the parent's name and random digits to create a custom ID
        $customID = str_replace(' ', '_', $parentName) . $randomDigits;

        // Ensure the ID is unique by checking the database
        // You can add additional logic here to handle duplicates if necessary

        return $customID;
    }
}