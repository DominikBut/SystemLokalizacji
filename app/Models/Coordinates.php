<?php

namespace App\Models;

use Carbon\Carbon;
use App\Observers\CoordinatesObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CoordinatesObserver::class])]
class Coordinates extends Model
{
    use HasFactory;

    protected $fillable = [
        'sim_id',
        'latitude',
        'longitude',
        'strength',
        'battery',
        'route',
    ];

    public function pojazd()
    {
        return $this->belongsTo(Vehicles::class, 'sim_id', 'sim_id')->where('user_id', auth()->id());
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

    public static function calculateDistance($points)
    {
        $totalDistance = 0.0;

        // Convert JSON string to array if necessary
        $pointsArray = is_string($points) ? json_decode($points, true)['points'] : $points;

        // Iterate over points to calculate distance between consecutive ones
        for ($i = 1; $i < count($pointsArray); $i++) {
            $point1 = $pointsArray[$i - 1];
            $point2 = $pointsArray[$i];

            $lat1 = deg2rad($point1['lat']);
            $lng1 = deg2rad($point1['lng']);
            $lat2 = deg2rad($point2['lat']);
            $lng2 = deg2rad($point2['lng']);

            $distance = self::haversineDistance($lat1, $lng1, $lat2, $lng2);
            $totalDistance += $distance;
        }

        return number_format($totalDistance, 3, ',', '');
    }

    public static function haversineDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371; // Radius of Earth in kilometers

        $deltaLat = $lat2 - $lat1;
        $deltaLng = $lng2 - $lng1;

        $a = sin($deltaLat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($deltaLng / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}
