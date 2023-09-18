<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSeatReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Seat_Id',
        'BusSeatNumber',
        'IsBooked',
        'Fk_Bus_ID',
    ];
}
