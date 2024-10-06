<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function pojazd()
    {
        return $this->belongsTo(Vehicles::class, 'simID', 'simID');
    }
}
