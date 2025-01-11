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

    #[Url(except: '', as: 'id')]
    public $checking = '';

    public function tracking(string $id)
    {
        $this->checking = '';
        $this->pojazd = $this->pojazdy->where('sim_id', "{$id}")->first();
        if (!is_null($this->pojazd)) {
            $this->dane = $this->pojazd->wspolrzedne()->orderBy('created_at', 'desc')->first();
            if (!is_null($this->dane)) {
                $this->dispatch('coords', lat: $this->lokacja->latitude, lng: $this->lokacja->longitude, nazwa: $this->pojazd->name, czas: $this->lokacja->created_at->timezone('Europe/Warsaw'));
            } else {
                $this->dispatch('coords', nazwa: $this->pojazd->name);
            }
        }
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
        $this->pojazdy = Vehicles::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        if ($this->pojazdy->count() > 0) {
            $this->pojazd = $this->pojazdy->first();
            $this->dane = $this->pojazd->wspolrzedne()->orderBy('created_at', 'desc')->first();
        }
    }
    public function render()
    {
        if ($this->checking and is_int($this->checking)) {
            $this->pojazdy = Vehicles::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
            if ($this->pojazdy->count() > 0) {
                $this->pojazd = $this->pojazdy->where('sim_id', "{$this->checking}")->first();
                if (!is_null($this->pojazd)) {
                    $this->dane = $this->pojazd->wspolrzedne()->orderBy('created_at', 'desc')->first();
                    if (!is_null($this->dane)) {
                        $this->dispatch('coords', lat: $this->lokacja->latitude, lng: $this->lokacja->longitude, nazwa: $this->pojazd->name, czas: $this->lokacja->created_at->timezone('Europe/Warsaw'));
                    } else {

                        $this->dispatch('coords', nazwa: $this->pojazd->name);
                    }
                } else {

                    $this->pojazd = $this->pojazdy->first();
                    $this->dane = $this->pojazd->wspolrzedne()->orderBy('created_at', 'desc')->first();
                    $this->checking = '';
                }
            } else {
                $this->checking = '';
            }
        } else {
            $this->checking = '';
        }

        return view('livewire.location-map', ['label' => (!is_null($this->pojazd) ? $this->pojazd->name : 'Brak pojazdów')]);
    }
}
