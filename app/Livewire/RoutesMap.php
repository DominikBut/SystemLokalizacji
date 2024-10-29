<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicles;
use App\Models\Coordinates;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Log;

class RoutesMap extends Component
{
    #[Locked]
    public $pojazdy;

    #[Locked]
    public $dane;

    #[Locked]
    public $pojazd;
    public $startIndex = 1; // Starting index for the displayed buttons
    public $buttonsPerPage = 3; // Number of buttons to display at a time
    public $totalRoutes;
    public $totalDistance = 0.0;
    public function previousPage()
    {
        // Ensure we don't go below 0, adjusting by buttonsPerPage
        $this->startIndex = max(0, $this->startIndex - $this->buttonsPerPage);
    }

    public function nextPage()
    {
        // Ensure we don't exceed the total routes, adjusting by buttonsPerPage
        $this->startIndex = min($this->totalRoutes - $this->buttonsPerPage, $this->startIndex + $this->buttonsPerPage);
    }

    public $selectedRoute; // To track the selected route

    public function selectRoute(int $routeNumber)
    {
        $this->selectedRoute = $routeNumber;

        if ($routeNumber <= $this->pojazd->current_route && $routeNumber >= 0) {
            // Retrieve and format the coordinates data
            $tmp_data = $this->pojazd->wspolrzedne()
                ->where('route', $routeNumber)
                ->orderBy('created_at', 'asc')
                ->get();

            // Retrieve the first point (point 0)
            $point_0 = Coordinates::where('simID', $this->pojazd->simID)
                ->where('route', 0)
                ->where('created_at', '<', $tmp_data->first()->created_at)->orderBy('created_at', 'desc')
                ->first();
            // Check if point 0 exists
            if ($point_0) {
                // Prepend point 0 to tmp_data
                $tmp_data->prepend((object) [
                    'latitude' => $point_0->latitude,
                    'longitude' => $point_0->longitude,
                    'created_at' => $point_0->created_at
                ]);
            }

            $this->dane = json_encode([
                "points" => $tmp_data // Adjust these column names based on your table structure
                    ->map(function ($coordinate) {
                        return [
                            'lat' => $coordinate->latitude,
                            'lng' => $coordinate->longitude,
                            'created_at' => $coordinate->created_at
                        ];
                    })
                    ->toArray()
            ]);
            $this->totalDistance = Coordinates::calculateDistance($this->dane);
            $this->dispatch('route', route: $this->dane, base_area: $this->pojazd->base_area);

            // $this->dane = json_encode([
            //     "points" => $this->pojazd->wspolrzedne()
            //         ->where('route', $routeNumber)
            //         ->orderBy('created_at', 'asc')
            //         ->get()
            //         ->map(function ($coordinate) {
            //             return [
            //                 'lat' => $coordinate->latitude,
            //                 'lng' => $coordinate->longitude,
            //                 'created_at' => $coordinate->created_at
            //             ];
            //         })
            //         ->toArray()
            // ]);
            // $this->totalDistance = Coordinates::calculateDistance($this->dane);
            // $this->dispatch('route', route: $this->dane, base_area: $this->pojazd->base_area);
        }
    }
    public function updateRouteButtons()
    {
        // Set total routes to the current route count
        $this->totalRoutes = max(1, $this->pojazd->current_route); // Ensure at least 1

        // Set startIndex to the last page of buttons
        $this->startIndex = max(0, $this->totalRoutes - $this->buttonsPerPage);
    }

    public function tracking(string $id)
    {
        $this->pojazd = Vehicles::where('simID', "{$id}")->first();
        $this->selectedRoute = $this->pojazd->current_route; // Set the initial selected route
        $this->updateRouteButtons();
        if ($this->pojazd->current_route > 0) {
            // Retrieve and format the coordinates data
            $tmp_data = $this->pojazd->wspolrzedne()
                ->where('route', $this->pojazd->current_route)
                ->orderBy('created_at', 'asc')
                ->get();

            // Retrieve the first point (point 0)
            $point_0 = Coordinates::where('simID', "{$id}")
                ->where('route', 0)
                ->where('created_at', '<', $tmp_data->first()->created_at)->orderBy('created_at', 'desc')
                ->first();
            // Check if point 0 exists
            if ($point_0) {
                // Prepend point 0 to tmp_data
                $tmp_data->prepend((object) [
                    'latitude' => $point_0->latitude,
                    'longitude' => $point_0->longitude,
                    'created_at' => $point_0->created_at
                ]);
            }

            $this->dane = json_encode([
                "points" => $tmp_data // Adjust these column names based on your table structure
                    ->map(function ($coordinate) {
                        return [
                            'lat' => $coordinate->latitude,
                            'lng' => $coordinate->longitude,
                            'created_at' => $coordinate->created_at
                        ];
                    })
                    ->toArray()
            ]);
            $this->totalDistance = Coordinates::calculateDistance($this->dane);
            $this->dispatch('route', route: $this->dane, base_area: $this->pojazd->base_area);
        }
    }
    #[Computed()]
    protected function lokacja()
    {
        return $this->dane;
    }

    public function mount()
    {
        $this->pojazdy = Vehicles::where('user_id', auth()->id())->orderBy('simID', 'desc')->get();
        if ($this->pojazdy->count() > 0) {
            $this->pojazd = $this->pojazdy->first();

            $this->selectedRoute = $this->pojazd->current_route; // Set the initial selected route
            $this->updateRouteButtons();
            $this->tracking($this->pojazd->simID);
        }
    }
    public function render()
    {
        return view('livewire.routes-map');
    }
}
