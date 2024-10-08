<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coordinates extends Model
{
    use HasFactory;

    protected $fillable = [
        'simID',
        'latitude',
        'longitude',
        'strength',
        'battery',
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone('Europe/Warsaw'); // Replace with your desired timezone
    }
    public function pojazd()
    {
        return $this->belongsTo(Vehicles::class, 'simID', 'simID');
    }
}
