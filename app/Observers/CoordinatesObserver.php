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
        // Find the corresponding vehicle using simid
        $vehicle = Vehicles::where('simID', $coordinates->simID)->first();

        if ($vehicle && ($vehicle->base_area != null)) {

            // Extract lat/lng coordinates for base_area polygon
            $polygonCoords = $vehicle->base_area['coordinates'] ?? [];

            // Perform the check if the new coordinate is within the polygon
            $isWithinBorders = $this->isPointInPolygon(
                ['lat' => $coordinates->latitude, 'lng' => $coordinates->longitude],
                $polygonCoords
            );
            Log::warning('czy koordy w? ' . var_export($isWithinBorders, true));
            Log::warning('noti wyslane? ' . $vehicle->notified);
            Log::warning('powiadomienia? ' . $vehicle->subscribe);

            if ($isWithinBorders == false) {
                //to do email
                if ($vehicle->notified == false) {
                    Log::warning('update' . $vehicle->id);
                    // Update the 'notified' field to true
                    $vehicle->update([
                        'notified' => true,
                        'current_route' => $vehicle->current_route + 1,
                    ]);
                    if ($vehicle->subscribe == true) {
                        //danger comunikat
                        Log::warning('wysyłam ' . $vehicle->wlasciciel()->first()->email);
                        // $ten = User::where('id', auth()->id())->first();
                        Mail::to($vehicle->wlasciciel()->first()->email)->send(new SendAlert($vehicle->Nazwa, $vehicle->simID, $coordinates->created_at));
                    }
                }
                $coordinates->update(['route' => $vehicle->current_route]);

                //jakies do tras
            } else if ($isWithinBorders == true) {
                //to do email
                if ($vehicle->notified == true) {
                    Log::warning('resetuje' . $vehicle->id);
                    // Update the 'notified' field to true
                    //last to check
                    $coordinates->update(['route' => $vehicle->current_route]);
                    $vehicle->update(['notified' => false]);
                }
                //jakies do tras
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
