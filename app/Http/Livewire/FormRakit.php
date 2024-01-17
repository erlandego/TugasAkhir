<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Image;
use PDO;

class FormRakit extends Component
{
    private $barang;
    private $gambar;
    public $rekomendasi;
    public $paket;
    private $proc;
    public $processor;
    public $processorcheck;
    public $processorPrice;
    public $processorweight;
    private $indikator;
    public $socket;
    public $totalberat;
    private $bantuan;

    private $motherboard;
    public $motherboardID;
    public $motherboardPrice;
    public $motherboardcheck;
    public $motherboardweight;

    private $ram;
    public $ramID;
    public $ramPrice;
    public $ramcheck;
    public $ramQty;
    public $ramweight;

    private $vga;
    public $vgaID;
    public $vgaPrice;
    public $vgacheck;
    public $vgaweight;

    private $fan;
    public $fanID;
    public $fanPrice;
    public $fanweight;

    private $case;
    public $caseID;
    public $casePrice;
    public $caseweight;

    private $psu;
    public $psuID;
    public $psuPrice;
    public $psucheck;
    public $psuweight;

    private $hide;
    public $slot;
    public $size;
    public $dimm;
    public $m2;
    public $nvme;
    public $totalpower;
    public $totalharga;

    public function mount($gambar , $barang , $rekomendasi , $paket){
        $this->barang = $barang;
        $this->gambar = $gambar;
        $this->rekomendasi = $rekomendasi;
        $this->paket = $paket;
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
        $this->totalberat = 0;
        $this->bantuan = false;
    }

    public function RekomendasiProc(){
        if($this->rekomendasi == 'gaming'){
            if($this->paket == 'High Spec'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i9%');
                    $query->orWhere('nama_barang','LIKE','%i7%');
                    $query->orWhere('nama_barang','LIKE','%AM5%');
                })->get();
            }
            else if($this->paket == 'Mid Range'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i7%');
                    $query->orWhere('nama_barang','LIKE','%i5%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                })->get();
            }
            else if($this->paket == 'Low Budget'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i5%');
                    $query->orWhere('nama_barang','LIKE','%i3%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                })->where('harga' , '<' , 2000000)->get();
            }
        }
        else if($this->rekomendasi == 'school'){
            if($this->paket == 'Elementary'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i5%');
                    $query->orWhere('nama_barang','LIKE','%i3%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                })->get();
            }
            else if($this->paket == 'Highschool'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i5%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                });
            }
        }
        else if($this->rekomendasi == 'home-office'){
            if($this->paket == 'Multi Tasking'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i5%');
                    $query->orWhere('nama_barang','LIKE','%i3%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                })->get();
            }
            else if($this->paket == 'Browsing and Watch'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i3%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                })->get();
            }
        }
        else if($this->rekomendasi == 'design'){
            if($this->paket == 'Graphic Designer'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i7%');
                    $query->orWhere('nama_barang','LIKE','%i5%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                })->get();
            }
            else if($this->paket == 'Video Editor'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i7%');
                    $query->orWhere('nama_barang','LIKE','%i5%');
                    $query->orWhere('nama_barang','LIKE','%AM4%');
                })->get();
            }
            else if($this->paket == 'Animator'){
                $cat = Category::where('name' , 'processor')->get();
                $idcat = $cat[0]->id;
                $this->proc = Barang::where('category_id' , $idcat)->where(function($query){
                    $query->orWhere('nama_barang','LIKE','%i9%');
                    $query->orWhere('nama_barang','LIKE','%i7%');
                    $query->orWhere('nama_barang','LIKE','%AM5%');
                })->get();
            }
        }
    }

    public function RekomendasiMotherboard(){
        $cat = Category::where('name' , 'motherboard')->get();
        $idcat = $cat[0]->id;
        if ($this->socket != "" || $this->socket != null) {
            if($this->rekomendasi == "gaming"){
                if($this->paket == 'High Spec'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
                else if($this->paket == 'Mid Range'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)
                    ->where('harga' , '<' , 3000000)->distinct()->get();
                }
                else if($this->paket == 'Low Budget'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)
                    ->where('harga' , '<' , 2000000)->distinct()->get();
                }
            }
            else if($this->rekomendasi == "school"){
                if($this->paket == 'Elementary'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'School')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
                else if($this->paket == 'Highschool'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'School')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
            }
            else if($this->rekomendasi == "home-office"){
                if($this->paket == 'Multi Tasking'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Home Office')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
                else if($this->paket == 'Browsing and Watch'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Home Office')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
            }
            else if($this->rekomendasi == "design"){
                if($this->paket == 'Graphic Designer'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Design')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
                else if($this->paket == 'Video Editor'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Design')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
                else if($this->paket == 'Animator'){
                    $this->motherboard = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Design')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->distinct()->get();
                }
            }
        }
    }

    public function RekomendasiRam(){
        $cat = Category::where('name' , 'RAM')->get();
        $idcat = $cat[0]->id;
        if($this->slot != null || $this->slot != ""){
            if($this->rekomendasi == "gaming"){
                if($this->paket == 'High Spec'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%16GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%32GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
                else if($this->paket == 'Mid Range'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%16GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
                else if($this->paket == 'Low Budget'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                    })->where('slot_id' , $this->slot)->where('harga' , '<' , 1000000)->get();
                }
            }
            else if($this->rekomendasi == "school"){
                if($this->paket == 'Elementary'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%4GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
                else if($this->paket == 'Highschool'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%16GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
            }
            else if($this->rekomendasi == "home-office"){
                if($this->paket == 'Multi Tasking'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%16GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
                else if($this->paket == 'Browsing and Watch'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%4GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
            }
            else if($this->rekomendasi == "design"){
                if($this->paket == 'Graphic Designer'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%16GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%32GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
                else if($this->paket == 'Video Editor'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%16GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%32GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
                else if($this->paket == 'Animator'){
                    $this->ram = Barang::where('category_id' , $idcat)->where(function($query){
                        $query->orWhere('nama_barang' , 'LIKE' , '%8GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%16GB%');
                        $query->orWhere('nama_barang' , 'LIKE' , '%32GB%');
                    })->where('slot_id' , $this->slot)->get();
                }
            }
        }
    }

    public function RekomendasiVGA(){
        $cat = Category::where('name' , 'VGA Card')->get();
        $idcat = $cat[0]->id;

        if($this->rekomendasi == "gaming"){
            if($this->paket == 'High Spec'){
                $this->vga = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->where(function($query){
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%RTX 20%');
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%RTX 30%');
                    })->distinct()->get();
            }
            else if($this->paket == 'Mid Range'){
                $this->vga = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->where(function($query){
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%RTX 20%');
                    })->distinct()->get();
            }
            else if($this->paket == 'Low Budget'){
                $this->vga = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->where(function($query){
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%GTX 16%');
                    })->distinct()->get();
            }
        }
        else if($this->rekomendasi == "school"){
            if($this->paket == 'Elementary'){
                $this->vga = [];
            }
            else if($this->paket == 'Highschool'){
                $this->vga = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'School')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->where(function($query){
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%GTX 16%');
                    })->distinct()->get();
            }
        }
        else if($this->rekomendasi == "home-office"){
            if($this->paket == 'Multi Tasking'){
                $this->vga = [];
            }
            else if($this->paket == 'Browsing and Watch'){
                $this->vga = [];
            }
        }
        else if($this->rekomendasi == "design"){
            if($this->paket == 'Graphic Designer'){
                $this->vga = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Design')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->where(function($query){
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%RTX 20%');
                    })->distinct()->get();
            }
            else if($this->paket == 'Video Editor'){
                $this->vga = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Design')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->where(function($query){
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%RTX 20%');
                    })->distinct()->get();
            }
            else if($this->paket == 'Animator'){
                $this->vga = Barang::select("barangs.*")
                    ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                    ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                    ->where('rekomendasis.nama_rekomendasi' , 'Design')
                    ->where('barangs.category_id' , $idcat)
                    ->where('barangs.socket_id' , $this->socket)->where(function($query){
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%RTX 40%');
                        $query->orWhere('barangs.nama_barang' , 'LIKE' , '%RTX 30%');
                    })->distinct()->get();
            }
        }
    }

    public function RekomendasiFan(){
        $cat = Category::where('name' , 'CPU Cooler')->get();
        $idcat = $cat[0]->id;

        if($this->rekomendasi == "gaming"){
            if($this->paket == 'High Spec'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                ->where('barangs.category_id' , $idcat)->orWhere('harga' , '>' , 1000000)->get();
            }
            else if($this->paket == 'Mid Range'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                ->where('barangs.category_id' , $idcat)->where('harga' , '<' , 1000000)->get();
            }
            else if($this->paket == 'Low Budget'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                ->where('barangs.category_id' , $idcat)->where('harga' , '<' , 500000)->get();
            }
        }
        else if($this->rekomendasi == "school"){
            if($this->paket == 'Elementary'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'School')
                ->where('barangs.category_id' , $idcat)->get();
            }
            else if($this->paket == 'Highschool'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'School')
                ->where('barangs.category_id' , $idcat)->get();
            }
        }
        else if($this->rekomendasi == "home-office"){
            if($this->paket == 'Multi Tasking'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Home Office')
                ->where('barangs.category_id' , $idcat)->get();
            }
            else if($this->paket == 'Browsing and Watch'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Home Office')
                ->where('barangs.category_id' , $idcat)->get();
            }
        }
        else if($this->rekomendasi == "design"){
            if($this->paket == 'Graphic Designer'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Design')
                ->where('barangs.category_id' , $idcat)->get();
            }
            else if($this->paket == 'Video Editor'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Design')
                ->where('barangs.category_id' , $idcat)->get();
            }
            else if($this->paket == 'Animator'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Design')
                ->where('barangs.category_id' , $idcat)->get();
            }
        }
    }

    public function RekomendasiCase(){
        $cat = Category::where('name' , 'Casing')->get();
        $idcat = $cat[0]->id;

        if($this->rekomendasi == "gaming"){
            if($this->paket == 'High Spec'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
            else if($this->paket == 'Mid Range'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
            else if($this->paket == 'Low Budget'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Gaming')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
        }
        else if($this->rekomendasi == "school"){
            if($this->paket == 'Elementary'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'School')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
            else if($this->paket == 'Highschool'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'School')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
        }
        else if($this->rekomendasi == "home-office"){
            if($this->paket == 'Multi Tasking'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Home Office')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
            else if($this->paket == 'Browsing and Watch'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Home Office')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
        }
        else if($this->rekomendasi == "design"){
            if($this->paket == 'Graphic Designer'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Design')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
            else if($this->paket == 'Video Editor'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Design')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
            else if($this->paket == 'Animator'){
                $this->fan = Barang::select("barangs.*")
                ->join('barang_rekomendasis' , 'barang_rekomendasis.barang_id' , '=' , 'barangs.id')
                ->join('rekomendasis' , 'rekomendasis.id' , '=' , 'barang_rekomendasis.rekomendasi_id')
                ->where('rekomendasis.nama_rekomendasi' , 'Design')
                ->where('barangs.category_id' , $idcat)->where('barangs.size_id' , $this->size)->get();
            }
        }
    }

    public function processor(){
        if($this->rekomendasi == null || $this->rekomendasi == ""){
            $cat = Category::where('name' , 'processor')->get();
            $idcat = $cat[0]->id;

            if($this->socket == null){
                $this->proc = Barang::where('category_id' , $idcat)->get();
                $this->indikator = "processor";
            }
            else{
                $this->proc = Barang::where('category_id' , $idcat)->where('socket_id' , '=' , $this->socket)->get();
                $this->indikator = "processor";
            }
        }
        else{
            $this->RekomendasiProc();
            $this->indikator = "processor";
        }
    }

    public function motherboard(){
        if($this->rekomendasi == null || $this->rekomendasi == ""){
            $cat = Category::where('name' , 'motherboard')->get();
            $idcat = $cat[0]->id;

            if($this->socket != "" || $this->socket != null){
                $this->motherboard = Barang::where('category_id' , $idcat)->where('socket_id' , '=' , $this->socket)->get();
            }
            else{
                $this->motherboard = Barang::where('category_id' , $idcat);
            }
        }
        else{
            $this->RekomendasiMotherboard();
        }

        $this->indikator = "motherboard";
    }

    public function ram(){
        if($this->rekomendasi == null || $this->rekomendasi == ""){
            $cat = Category::where('name' , 'RAM')->get();
            $idcat = $cat[0]->id;

            if($this->slot != "" || $this->slot != null){
                $this->ram = Barang::where('category_id' , $idcat)->where('slot_id' , $this->slot)->get();
            }
            else{
                $this->ram = Barang::where('category_id' , $idcat);
            }
        }
        else{
            $this->RekomendasiRam();
        }

        $this->indikator = "ram";
    }

    public function vga(){
        if($this->rekomendasi == null || $this->rekomendasi == ""){
            $cat = Category::where('name' , 'VGA Card')->get();
            $idcat = $cat[0]->id;

            $this->vga = Barang::where('category_id' , $idcat)->get();
        }
        else{
            $this->RekomendasiVGA();
        }
        $this->indikator = "vga";
    }

    public function fan(){
        if($this->rekomendasi == null || $this->rekomendasi == ""){
            $cat = Category::where('name' , 'CPU Cooler')->get();
            $idcat = $cat[0]->id;

            $this->fan = Barang::where('category_id' , $idcat)->get();
        }
        else{
            $this->RekomendasiFan();
        }
        $this->indikator = "fan";
    }

    public function case(){

        if($this->rekomendasi == null || $this->rekomendasi == ""){
            $cat = Category::where('name' , 'Casing')->get();
            $idcat = $cat[0]->id;

            if ($this->size != "" || $this->size != null) {
                $this->case = Barang::where('category_id' , $idcat)->where('size_id' , $this->size)->get();
            }
            else{
                $this->case = Barang::where('category_id' , $idcat);
            }
        }
        else{
            $this->RekomendasiCase();
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

    public function hitungberat(){
        $this->totalberat = $this->processorweight + $this->motherboardweight + $this->ramweight + $this->vgaweight + $this->fanweight + $this->caseweight + $this->psuweight;
    }

    public function updatedRamQty(){
        $this->ramPrice = $this->ramPrice * $this->ramQty;
        $this->hide = true;
    }

    public function bantuan($indikator){
        if($indikator == "processor"){
            $this->indikator = "processor";
        }
        else if($indikator == "motherboard"){
            $this->indikator = "motherboard";
        }
        else if($indikator == "ram"){
            $this->indikator = "ram";
        }
        else if($indikator == "vga"){
            $this->indikator = "vga";
        }
        else if($indikator == "fan"){
            $this->indikator = "fan";
        }
        else if($indikator == "case"){
            $this->indikator = "case";
        }
        else if($indikator == "psu"){
            $this->indikator = "psu";
        }

        $this->bantuan = true;
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
        $this->hitungberat();

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
            'totalberat' => $this->totalberat,
            'ramQty' => $this->ramQty,
            'bantuan' => $this->bantuan
        ]);
    }
}
