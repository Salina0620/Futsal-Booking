<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FutsalGround extends Model

{
use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
        'location',
        'price_per_hour',
    ];

    public function vendor()
    {

        return $this->belongsTo(Vendor::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
