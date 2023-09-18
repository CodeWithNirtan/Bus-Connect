<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDriverModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'Driver_Id',
        'BusDriverName',
        'BusDriverPhoneNumber',
        'BusDriverCNICNumber',
        'BusDriverLicense',
        'age',
        'image',
        'Gender',
        'BusId',
        'Area_Fk_Id'
    ];
}
