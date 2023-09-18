<?php
namespace App\Http\Services;

class FirebaseServices
{
    private $database_ref;
    private $database;


    public function __construct($database) {
        $this->$database = env("FirebaseDb_url");
    }

    public function Createuser($object,$ref){
         $database->getReference($ref)
   ->push($object);

      
    }
}