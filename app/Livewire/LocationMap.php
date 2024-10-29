<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicles;
use Livewire\Attributes\Url;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class LocationMap extends Component
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
        $this->dane = $this->pojazd->wspolrzedne()->orderBy('created_at', 'desc')->first();
        $this->dispatch('coords', lat: $this->lokacja->latitude, lng: $this->lokacja->longitude, nazwa: $this->pojazd->Nazwa, czas: $this->lokacja->created_at->timezone('Europe/Warsaw'));
    }
    #[Computed()]
    protected function lokacja()
    {
        return $this->dane;
    }
    #[Computed()]
    protected function tracker()
    {
        return $this->pojazd;
    }
    public function mount()
    {
        $this->pojazdy = Vehicles::where('user_id', auth()->id())->get();
        if ($this->pojazdy->count() > 0) {
            $this->pojazd = $this->pojazdy->first();
            $this->dane = $this->pojazd->wspolrzedne()->orderBy('created_at', 'desc')->first();
        }
    }
    public function render()
    {

        return view('livewire.location-map');
    }
}
