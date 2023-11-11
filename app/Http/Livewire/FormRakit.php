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
    public $processorcheck;
    public $processorPrice;
    private $indikator;
    public $socket;

    private $motherboard;
    public $motherboardID;
    public $motherboardPrice;
    public $motherboardcheck;

    private $ram;
    public $ramID;
    public $ramPrice;
    public $ramcheck;
    public $ramQty;

    private $vga;
    public $vgaID;
    public $vgaPrice;
    public $vgacheck;

    private $fan;
    public $fanID;
    public $fanPrice;

    private $case;
    public $caseID;
    public $casePrice;

    private $psu;
    public $psuID;
    public $psuPrice;
    public $psucheck;

    private $hide;
    public $slot;
    public $size;
    public $dimm;
    public $m2;
    public $nvme;
    public $totalpower;
    public $totalharga;

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
        $this->totalpower = 0;
        $this->processorcheck = false;
        $this->motherboardcheck = false;
        $this->ramcheck = false;
        $this->vgacheck = false;
        $this->psucheck = false;
        $this->processorPrice = 0;
        $this->motherboardPrice = 0;
        $this->ramPrice = 0;
        $this->vgaPrice = 0;
        $this->fanPrice = 0;
        $this->casePrice = 0;
        $this->psuPrice = 0;
        $this->totalharga = 0;
        $this->ramQty = 0;
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
        else{
            $this->motherboard = Barang::where('category_id' , $idcat);
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
        else{
            $this->ram = Barang::where('category_id' , $idcat);
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
        else{
            $this->case = Barang::where('category_id' , $idcat);
        }

        $this->indikator = "case";
    }

    public function psu(){
        $cat = Category::where('name' , 'Power Supply')->get();
        $idcat = $cat[0]->id;

        $this->psu = Barang::where('category_id' , $idcat)->where('power' , '>=' , $this->totalpower)->get();

        $this->indikator = 'psu';
    }

    public function hitungtotal(){
        $this->totalharga = $this->processorPrice + $this->motherboardPrice + $this->ramPrice + $this->vgaPrice + $this->fanPrice + $this->casePrice + $this->psuPrice;
    }

    public function updatedRamQty(){
        $this->ramPrice = $this->ramPrice * $this->ramQty;
        $this->hide = true;
    }

    public function hide($power , $indikator){

        $this->hide = true;

        if($indikator == "processor"){
            if($this->processorcheck == false){
                $pwr = $this->totalpower + $power;
                $this->totalpower = $pwr;
                $this->processorcheck = true;
            }
        }
        else if($indikator == "motherboard"){
            if($this->motherboardcheck == false){
                $pwr = $this->totalpower + $power;
                $this->totalpower = $pwr;
                $this->motherboardcheck = true;
            }
        }
        else if($indikator == "ram"){
            if($this->ramcheck == false){
                $pwr = $this->totalpower + $power;
                $this->totalpower = $pwr;
                $this->ramcheck = true;
            }
        }
        else if($indikator == "vga"){
            if($this->vgacheck == false){
                $pwr = $this->totalpower + $power;
                $this->totalpower = $pwr;
                $this->vgacheck = true;
            }
        }
        else if($indikator == "psu"){
            if($this->processorcheck == false){
                $this->processorcheck = true;
            }
        }
    }

    public function render()
    {
        $this->hitungtotal();

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
            'psu' => $this->psu,
            'totalpower' => $this->totalpower,
            'totalharga' => $this->totalharga,
            'ramQty' => $this->ramQty
        ]);
    }
}
