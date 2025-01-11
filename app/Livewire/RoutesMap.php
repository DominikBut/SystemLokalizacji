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
    public $startIndex = 1;
    public $buttonsPerPage = 3;
    public $totalRoutes;
    public $totalDistance = 0.0;
    public function previousPage()
    {

        $this->startIndex = max(0, $this->startIndex - $this->buttonsPerPage);
    }

    public function nextPage()
    {

        $this->startIndex = min($this->totalRoutes - $this->buttonsPerPage, $this->startIndex + $this->buttonsPerPage);
    }

    public $selectedRoute;

    public function selectRoute(int $routeNumber)
    {
        $this->selectedRoute = $routeNumber;

        if ($routeNumber <= $this->pojazd->current_route && $routeNumber >= 0) {

            $tmp_data = $this->pojazd->wspolrzedne()
                ->where('route', $routeNumber)
                ->orderBy('created_at', 'asc')
                ->get();


            $point_0 = Coordinates::where('sim_id', $this->pojazd->sim_id)
                ->where('route', 0)
                ->where('created_at', '<', $tmp_data->first()->created_at)->orderBy('created_at', 'desc')
                ->first();

            if ($point_0) {

                $tmp_data->prepend((object) [
                    'latitude' => $point_0->latitude,
                    'longitude' => $point_0->longitude,
                    'created_at' => $point_0->created_at
                ]);
            }

            $this->dane = json_encode([
                "points" => $tmp_data
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
    public function updateRouteButtons()
    {

        $this->totalRoutes = max(1, $this->pojazd->current_route);

        $this->startIndex = max(0, $this->totalRoutes - $this->buttonsPerPage);
    }

    public function tracking(string $id)
    {
        $this->pojazd = Vehicles::where('sim_id', "{$id}")->first();
        $this->selectedRoute = $this->pojazd->current_route;
        $this->updateRouteButtons();
        if ($this->pojazd->current_route > 0) {

            $tmp_data = $this->pojazd->wspolrzedne()
                ->where('route', $this->pojazd->current_route)
                ->orderBy('created_at', 'asc')
                ->get();

            $point_0 = Coordinates::where('sim_id', "{$id}")
                ->where('route', 0)
                ->where('created_at', '<', $tmp_data->first()->created_at)->orderBy('created_at', 'desc')
                ->first();

            if ($point_0) {

                $tmp_data->prepend((object) [
                    'latitude' => $point_0->latitude,
                    'longitude' => $point_0->longitude,
                    'created_at' => $point_0->created_at
                ]);
            }

            $this->dane = json_encode([
                "points" => $tmp_data
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
        } else {
            $this->dane = null;

            $this->totalDistance = 0;
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
        $this->pojazdy = Vehicles::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        if ($this->pojazdy->count() > 0) {
            $this->pojazd = $this->pojazdy->first();

            $this->selectedRoute = $this->pojazd->current_route;
            $this->updateRouteButtons();
            $this->tracking($this->pojazd->sim_id);
        }
    }
    public function render()
    {
        return view('livewire.routes-map');
    }
}
