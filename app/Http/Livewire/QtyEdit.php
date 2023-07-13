<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QtyEdit extends Component
{
    public $qty;

    public function mount($qty){
        $this->qty = $qty;
    }

    public function render()
    {
        return view('livewire.qty-edit' , [
            'qty' => $this->qty
        ]);
    }
}
