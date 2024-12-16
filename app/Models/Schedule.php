<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'futsal_ground_id',
        'date',
        'start_time',
        'end_time',
    ];
    public function futsalGround()
    {
        return $this->belongsTo(FutsalGround::class);
    }
}
