<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sim_id',
        'phone',
        'name',
        'description',
        'status',
        'base_area',
        'subscribe',
        'notified',
        'current_route',
    ];
    public function wlasciciel()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function wspolrzedne()
    {
        return $this->hasMany(Coordinates::class, 'sim_id', 'sim_id');
    }
    protected $casts = [
        'base_area' => 'json',
    ];
}
