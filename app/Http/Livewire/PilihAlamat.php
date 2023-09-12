<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\Kecamatan;

class PilihAlamat extends Component
{
    public $listprovinsi;
    protected $listkabupaten;
    protected $listkecamatan;
    public $provinsi;
    public $kabupaten;
    public $ctr;
    public $checkkab;

    public function mount($listprovinsi){
        $this->listprovinsi = $listprovinsi;
        $this->checkkab = false;
        // $this->listkabupaten = [];
        // $this->listkecamatan = [];
    }

    public function updatedProvinsi(){
        $this->listkabupaten = City::where('provinsi_id' , '=' , $this->provinsi)->get();
        //$this->ctr = $this->provinsi;
    }

    public function updatedKabupaten(){
        $this->listkabupaten = City::where('provinsi_id' , '=' , $this->provinsi)->get();
        $this->listkecamatan = Kecamatan::where('city_id' , '=' , $this->kabupaten)->get();
        $this->checkkab = true;
    }

    public function render()
    {
        return view('livewire.pilih-alamat', [
            'listprovinsi' => $this->listprovinsi,
            'listkabupaten' => $this->listkabupaten,
            'listkecamatan' => $this->listkecamatan,
            'checkkab' => $this->checkkab
        ]);
    }
}
