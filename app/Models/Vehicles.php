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
    ];
    public function wlasciciel()
    {
        return $this->belongsTo(User::class);
    }
    public function wspolrzedne()
    {
        return $this->hasMany(Coordinates::class, 'simID');
    }
}
