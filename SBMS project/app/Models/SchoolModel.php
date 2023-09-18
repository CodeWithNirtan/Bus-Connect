<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'School_id',
        'SchoolName',
        'SchoolPrincipalName',
        'SchoolPhoneNumber',
        'SchoolEmail',
        'SchoolPassword',
        'Fk_Area_Id',
    ];
}
