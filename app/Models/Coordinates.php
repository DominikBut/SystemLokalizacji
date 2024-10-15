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

    public function pojazd()
    {
        return $this->belongsTo(Vehicles::class, 'simID', 'simID');
    }
    // Function to convert decimal degrees to DMS format
    public static function formatCoordinates($lat, $lng)
    {
        return self::toDMS($lat) . '&nbsp;&nbsp;&nbsp;&nbsp;' . self::toDMS($lng, true);
    }

    private static function toDMS($degree, $isLongitude = false)
    {
        $isNegative = $degree < 0;
        $degree = abs($degree);

        $degrees = floor($degree);
        $minutes = floor(($degree - $degrees) * 60);
        $seconds = (($degree - $degrees) * 60 - $minutes) * 60;

        // Construct the DMS string
        $direction = $isLongitude
            ? ($isNegative ? 'W' : 'E')
            : ($isNegative ? 'S' : 'N');

        return "{$degrees}°{$minutes}'" . number_format($seconds, 2) . "\"$direction";
    }
    public static function formatCreatedAt($date, $locale = 'pl', $timezone = 'Europe/Warsaw')
    {
        Carbon::setLocale($locale);
        return $date->timezone($timezone)->translatedFormat('j F Y H:i:s');
    }
}
