<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\Kecamatan;

class EditAlamat extends Component
{
    public $listprovinsi;
    protected $listkabupaten;
    protected $listkecamatan;
    public $provinsi;
    public $kabupaten;
    public $checkkab;
    public $alamat;

    public function mount($listprovinsi , $alamat){
        $this->listprovinsi = $listprovinsi;
        $this->checkkab = false;
        $this->alamat = $alamat;

        $idprovinsi = $alamat->provinsi_id;
        $idkabupaten = $alamat->city_id;
        $this->provinsi = $idprovinsi;
        $this->kabupaten = $idkabupaten;
        $this->listkabupaten = City::where('provinsi_id' , '=' , $idprovinsi)->get();
        $this->listkecamatan = Kecamatan::where('city_id' , '=' , $idkabupaten)->get();
    }

    public function updatedProvinsi(){
        $this->listkabupaten = City::where('provinsi_id' , '=' , $this->provinsi)->get();
        $this->listkecamatan = [];
    }

    public function updatedKabupaten(){
        $this->listkecamatan = Kecamatan::where('city_id' , '=' , $this->kabupaten)->get();
        $this->listkabupaten = City::where('provinsi_id' , '=' , $this->provinsi)->get();
        $this->checkkab = true;
    }

    public function render()
    {
        return view('livewire.edit-alamat' , [
            'listprovinsi' => $this->listprovinsi,
            'listkabupaten' => $this->listkabupaten,
            'listkecamatan' => $this->listkecamatan,
            'alamat' => $this->alamat
        ]);
    }
}
