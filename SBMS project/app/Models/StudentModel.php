<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $fillables = [
        'Student_id',
        'Student_full_name',
        'Student_class',
        'Student_age',
        'Parents_number',
        'Student_Email',
        'Student_Password',
        'Fk_Parent_id',
        'Fk_area',
        'Fk_bus',
        'Fk_bus_seat'

    ];
}
