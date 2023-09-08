<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\address;

class GantiAlamat extends Component
{
    public $alamat;
    public $iduser;

    public function mount($alamat, $iduser){
        $this->alamat = $alamat;
        $this->iduser = $iduser;
    }

    public function utama($idalamat){
        $idbaru = $idalamat;
        $idlama = 0;
        
        foreach ($this->alamat as $value) {
            if( $value->user_id == $this->iduser && $value->utama == 1){
                $idlama = $value->id;
            }
        }

        //Hilangkan status utama
        address::where('id' , $idlama)->update([
            'utama' => 0,
        ]);

        //tambahkan status utama
        address::where('id' , $idbaru)->update([
            'utama' => 1,
        ]);

        $this->alamat = address::all();
    }

    public function render()
    {
        return view('livewire.ganti-alamat',[
            'alamat' => $this->alamat,
            'iduser' => $this->iduser
        ]);
    }
}
