<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

use HasFactory;
protected $fillable = [
'futsal_ground_id',
'customer_phone',
'date',
'start_time',
'end_time',
];


    public function futsalGround()
    {
        return $this->belongsTo(FutsalGround::class);
    }
}
