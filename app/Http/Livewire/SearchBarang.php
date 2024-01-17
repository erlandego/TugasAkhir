<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barang;

class SearchBarang extends Component
{

    public $search;
    public $checker;
    protected $queryString = ["search"];

    public function mount($checker){
        $this->checker = $checker;
    }

    public function diclick(){
        $this->checker = false;
    }

    public function render()
    {
        return view('livewire.search-barang' , [
            'barangs' => Barang::where([
                ['nama_barang' , 'like' , '%'. $this->search. '%']
            ])->get(),
        ]);
    }
}
