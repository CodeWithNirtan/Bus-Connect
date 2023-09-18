<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusModel extends Model
{
    use HasFactory;

    protected $fillables = [
        'Bus_Id',
        'owner_name',
        'CNIC',
        'Owner_phone_number',
        'Bus_number_plate',
        'Seats',
        'Fk_areaid',
        'Driver_id',
    ];
}
