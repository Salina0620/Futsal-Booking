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
'total_amount',
];


    public function futsalGround()
    {
        return $this->belongsTo(FutsalGround::class);
    }
    protected static function booted()
    {
        static::saving(function ($booking) {
            $start = strtotime($booking->start_time);
            $end = strtotime($booking->end_time);
            $durationInHours = ($end - $start) / 3600;

            // Calculate total amount
            $booking->total_amount = $durationInHours * $booking->futsalGround->price_per_hour;
        });
    }

}
