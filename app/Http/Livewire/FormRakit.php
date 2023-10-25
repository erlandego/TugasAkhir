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
    public $motherboardID;

    private $ram;
    public $ramID;

    private $vga;
    public $vgaID;

    private $fan;
    public $fanID;

    private $case;
    public $caseID;

    private $psu;
    public $psuID;

    private $hide;
    public $slot;
    public $size;
    public $dimm;
    public $m2;
    public $nvme;
    public $totalpower;

    public function mount($gambar , $barang){
        $this->barang = $barang;
        $this->gambar = $gambar;
        $this->indikator = "";
        $this->proc = null;
        $this->processor = "";
        $this->motherboardID = "";
        $this->ramID = "";
        $this->socket = "";
        $this->hide = false;
        $this->slot = "";
        $this->size = "";
        $this->dimm = "";
        $this->m2 = "";
        $this->nvme = "";
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
            $this->motherboard = Barang::where('category_id' , $idcat)->where('socket_id' , '=' , $this->socket)->get();
        }

        //dd($this->socket);

        $this->indikator = "motherboard";
    }

    public function ram(){
        $cat = Category::where('name' , 'RAM')->get();
        $idcat = $cat[0]->id;

        if($this->slot != "" || $this->slot != null){
            $this->ram = Barang::where('category_id' , $idcat)->where('slot_id' , $this->slot)->get();
        }

        $this->indikator = "ram";
    }

    public function vga(){
        $cat = Category::where('name' , 'VGA Card')->get();
        $idcat = $cat[0]->id;

        $this->vga = Barang::where('category_id' , $idcat)->get();
        $this->indikator = "vga";
    }

    public function fan(){
        $cat = Category::where('name' , 'CPU Cooler')->get();
        $idcat = $cat[0]->id;

        $this->fan = Barang::where('category_id' , $idcat)->get();
        $this->indikator = "fan";
    }

    public function case(){
        $cat = Category::where('name' , 'Casing')->get();
        $idcat = $cat[0]->id;

        if ($this->size != "" || $this->size != null) {
            $this->case = Barang::where('category_id' , $idcat)->where('size_id' , $this->size)->get();
        }

        $this->indikator = "case";
    }

    public function psu(){
        $cat = Category::where('name' , 'Power Supply')->get();
        $idcat = $cat[0]->id;

        $this->psu = Barang::where('category_id' , $idcat)->where('power' , '>' , $this->power)->get();

        $this->indikator = 'psu';
    }

    public function hide($power){
        $this->hide = true;

        if($power == null){
            $this->totalpower += 0;
        }else{
            $this->totalpower += $power;
        }
    }

    public function render()
    {
        return view('livewire.form-rakit' , [
            'barang' => $this->barang,
            'image' => Image::all(),
            'proc' => $this->proc,
            'motherboard' => $this->motherboard,
            'indikator' => $this->indikator,
            'hide' => $this->hide,
            'ram' => $this->ram,
            'dimm' => $this->dimm,
            'vga' => $this->vga,
            'fan' => $this->fan,
            'case' => $this->case,
            'psu' => $this->psu
        ]);
    }
}
