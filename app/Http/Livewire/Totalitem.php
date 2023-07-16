<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Totalitem extends Component
{
    protected  $listener = ['ubah_total' => 'refreshTotal'];
    public $total;

    // public function mount($total){
    //     $this->total = $total;
    // }

    public function refreshTotal($total){
        $this->total = $total;
    }

    public function render()
    {
        return view('livewire.totalitem' , [
            'total' => $this->total
        ]);
    }
}
