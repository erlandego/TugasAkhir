<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Image;

class FormRakit extends Component
{
    private $barang;
    private $gambar;
    private $proc;
    public $processor;
    private $indikator;
    public $socket;
    private $motherboard;

    public function mount($gambar , $barang){
        $this->barang = $barang;
        $this->gambar = $gambar;
        $this->indikator = "";
        $this->proc = null;
        $this->processor = "";
        $this->socket = "";
    }

    public function processor(){
        $cat = Category::where('name' , 'processor')->get();
        $idcat = $cat[0]->id;

        $this->proc = Barang::where('category_id' , $idcat)->get();
        $this->indikator = "processor";
    }

    public function motherboard(){
        $cat = Category::where('name' , 'motherboard')->get();
        $idcat = $cat[0]->id;

        if($this->socket != "" || $this->socket != null){
            $this->motherboard = Barang::where('category_id' , $idcat)->where('socket_id' , $this->socket)->get();
        }

        $this->indikator = "motherboard";
    }

    // public function updatedSocket(){
    //     dd($this->socket);
    // }

    public function render()
    {
        return view('livewire.form-rakit' , [
            'barang' => $this->barang,
            'image' => Image::all(),
            'proc' => $this->proc,
            'indikator' => $this->indikator,
        ]);
    }
}
