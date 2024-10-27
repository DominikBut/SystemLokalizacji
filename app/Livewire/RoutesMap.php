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


    public function tracking(string $id)
    {
        $this->pojazd = Vehicles::where('simID', "{$id}")->first();
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
        $this->pojazd = $this->pojazdy->first();

        if ($this->pojazd->current_route > 0) {
            // Retrieve and format the coordinates data
            $tmp_data = $this->pojazd->wspolrzedne()
                ->where('route', $this->pojazd->current_route)
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

            $this->dispatch('route', route: $this->dane, base_area: $this->pojazd->base_area);
        }
    }
    public function render()
    {
        return view('livewire.routes-map');
    }
}
