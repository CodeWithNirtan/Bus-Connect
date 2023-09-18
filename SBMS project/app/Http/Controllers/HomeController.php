<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
        // public function __construct()
        // {
        //     $this->middleware('auth');
        // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $firebase = (new Factory)
        //     ->withServiceAccount(__DIR__.'/crude-4b299-firebase-adminsdk-fw6pk-a8c90beabc.json')
        //     ->withDatabaseUri($firebaseServices->database);
 
//         $database = $firebase->createDatabase();
 
//         // $blog = $database
//         // ->getReference('blog');
 
//         // echo '<pre>';
//         // print_r($blog->getvalue());
//         // echo '</pre>';



//         $database->getReference('Users')
//    ->push([
//        'name' => 'My Application',
//        'emails' => 'support@domain.tld',
//        'password' => 'https://app.domain.tld',
//       ]);


 
        // echo '<pre>';
        // print_r($database
        // ->getReference('blog')->getvalue());
        // echo '</pre>';
        return view('index');
    }
}
