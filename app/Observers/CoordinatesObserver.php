<?php

namespace App\Observers;

use App\Mail\SendAlert;
use App\Models\Vehicles;
use App\Models\Coordinates;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CoordinatesObserver
{
    /**
     * Handle the Coordinates "created" event.
     */
    public function created(Coordinates $coordinates): void
    {
        $vehicle = Vehicles::where('sim_id', $coordinates->sim_id)->first();

        if ($vehicle && ($vehicle->base_area != null)) {


            $polygonCoords = $vehicle->base_area['coordinates'] ?? [];


            $isWithinBorders = $this->isPointInPolygon(
                ['lat' => $coordinates->latitude, 'lng' => $coordinates->longitude],
                $polygonCoords
            );
            Log::warning('Coords? ' . var_export($isWithinBorders, true));
            Log::warning('Wyslano? ' . $vehicle->notified);
            Log::warning('Powiadomienia? ' . $vehicle->subscribe);

            if ($isWithinBorders == false) {

                if ($vehicle->notified == false) {
                    Log::warning('Update?' . $vehicle->id);

                    $vehicle->update([
                        'notified' => true,
                        'current_route' => $vehicle->current_route + 1,
                    ]);
                    if ($vehicle->subscribe == true) {

                        Log::warning('Wysyłam: ' . $vehicle->wlasciciel()->first()->email);

                        Mail::to($vehicle->wlasciciel()->first()->email)->send(new SendAlert($vehicle->name, $vehicle->sim_id, $coordinates->created_at));
                    }
                }
                $coordinates->update(['route' => $vehicle->current_route]);
            } else if ($isWithinBorders == true) {

                if ($vehicle->notified == true) {
                    Log::warning('Restart: ' . $vehicle->id);

                    $coordinates->update(['route' => $vehicle->current_route]);
                    $vehicle->update(['notified' => false]);
                }
            }
        }
    }
    private function isPointInPolygon($point, $polygon)
    {
        $x = $point['lng'];
        $y = $point['lat'];
        $inside = false;
        $n = count($polygon);

        for ($i = 0, $j = $n - 1; $i < $n; $j = $i++) {
            $xi = $polygon[$i]['lng'];
            $yi = $polygon[$i]['lat'];
            $xj = $polygon[$j]['lng'];
            $yj = $polygon[$j]['lat'];

            $intersect = (($yi > $y) != ($yj > $y)) &&
                ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);
            if ($intersect) {
                $inside = !$inside;
            }
        }

        return $inside;
    }
    /**
     * Handle the Coordinates "updated" event.
     */
    public function updated(Coordinates $coordinates): void
    {
        //
    }

    /**
     * Handle the Coordinates "deleted" event.
     */
    public function deleted(Coordinates $coordinates): void
    {
        //
    }

    /**
     * Handle the Coordinates "restored" event.
     */
    public function restored(Coordinates $coordinates): void
    {
        //
    }

    /**
     * Handle the Coordinates "force deleted" event.
     */
    public function forceDeleted(Coordinates $coordinates): void
    {
        //
    }
}
