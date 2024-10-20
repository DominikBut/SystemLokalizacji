<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'simID',
        'Telefon',
        'Nazwa',
        'Opis',
        'Status',
        'Odbieranie',
        'base_area',
        'subscribe',
        'notified',
    ];
    public function wlasciciel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function wspolrzedne()
    {
        return $this->hasMany(Coordinates::class, 'simID', 'simID');
    }
    protected $casts = [
        'base_area' => 'json',
    ];
}
