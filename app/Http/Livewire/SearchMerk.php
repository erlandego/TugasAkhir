<?php

namespace App\Http\Livewire;

use App\Models\Merk;
use Livewire\Component;
use PDO;

class SearchMerk extends Component
{
    public $search;
    protected $queryString = ["search"];

    public function render()
    {
        return view('livewire.search-merk' , [
            'merks' => Merk::where([
                ['nama_merk' , '!=' , 'Intel'],
                ['nama_merk' , '!=' , 'AMD'] ,
                ['nama_merk' , 'like' , '%'. $this->search. '%']
            ])->get()
        ]);
    }
}
