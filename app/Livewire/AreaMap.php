<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicles;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Computed;

class AreaMap extends Component
{
    #[Locked]
    public $pojazdy;

    #[Locked]
    public $pojazd;
    public $obszar = null;



    #[On('updateShape')]
    public function updateShapeArea($data)
    {
        if (!is_null($data)) {
            $this->obszar = json_encode($data, true);
        } else {
            $this->obszar = NULL;
        }
        try {
            Vehicles::where('simID', "{$this->pojazd->simID}")->update([
                'base_area' => $this->obszar,
            ]);
            session()->flash('success', 'Post Updated Successfully!!');
        } catch (\Exception $ex) {
            session()->flash('success', 'Something goes wrong!!');
        }
        $this->dispatch('goood', "Donezo");
    }
    public function toggleSubscribe()
    {
        try {
            // Toggle the subscribe value using the update method
            $this->pojazd->update(['subscribe' => !$this->pojazd->subscribe]);

            session()->flash('success', 'Subscription status updated successfully!');
        } catch (\Exception $ex) {
            session()->flash('error', 'Something went wrong!');
        }
    }
    public function tracking(string $id)
    {
        $this->pojazd = Vehicles::where('simID', "{$id}")->first();
        $this->obszar = json_encode($this->pojazd->base_area);
        $this->dispatch('area', nazwa: $this->pojazd->Nazwa, base_area: $this->pojazd->base_area);
    }

    public function mount()
    {
        $this->pojazdy = Vehicles::where('user_id', auth()->id())->get();
        $this->pojazd = $this->pojazdy->first();
        $this->obszar = json_encode($this->pojazd->base_area);
        $this->dispatch('area', nazwa: $this->pojazd->Nazwa, base_area: $this->pojazd->base_area);
    }
    public function render()
    {
        return view('livewire.area-map');
    }
}
