<?php

namespace App\Http\Livewire;

use App\Models\Merk;
use Livewire\Component;
use PDO;

class SearchMerk extends Component
{
    public $search;
    public $barang = [];
    public $ctr = 0;
    public $checker;
    protected $queryString = ["search"];

    public function mount($barang , $checker){
        if($barang != null){
            $this->barang = $barang;
            $this->search = $barang->Merk->nama_merk;
            $this->checker = $checker;
        }
    }

    public function diclick(){
        $this->checker = false;
    }

    public function render()
    {
        return view('livewire.search-merk' , [
            'merks' => Merk::where([
                ['nama_merk' , '!=' , 'Intel'],
                ['nama_merk' , '!=' , 'AMD'] ,
                ['nama_merk' , 'like' , '%'. $this->search. '%']
            ])->get(),
            'barang' => $this->barang
        ]);
    }
}
