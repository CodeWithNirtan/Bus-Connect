<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class contactcontroller extends Controller
{

    
    public function postcontact(Request $req)
    {
        $contacts = new contact();

        $contacts->contact_name = $req->ContactName;
        $contacts->contact_email = $req->ContactEmail;
        $contacts->contact_subject = $req->ContactSubject;
        $contacts->contact_message = $req->ContactMessage;

        $contacts->save();
        Alert::success('Message Send Successfully');
        return redirect()->back();
    }

    public function contactdetails()
    {
        $contacts = contact::all();
        return view('Admindashboard/contactmessage', compact('contacts'));
    }
}
