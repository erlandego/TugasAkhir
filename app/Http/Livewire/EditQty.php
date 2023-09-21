<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use PDO;

class EditQty extends Component
{
    public $qty;
    public $qty2;
    public $idcart;
    public $harga;
    public $total;
    public $namabarang;
    public $gambar;
    public $hapus;
    public $berat;

    public function mount($qty , $idcart , $harga , $total , $namabarang , $berat , $gambar){
        $this->qty = $qty;
        $this->qty2 = $qty;
        $this->idcart = $idcart;
        $this->harga = $harga;
        $this->total = $total;
        $this->namabarang = $namabarang;
        $this->gambar = $gambar;
        $this->hapus = false;
        $this->berat = $berat;
    }

    public function tambah(){
        $this->qty += 1;
        $total = $this->harga * $this->qty;
        $totalberat = $this->berat * $this->qty;
        $this->berat = $totalberat;
        $this->total = $total;
        Cart::where('id' , $this->idcart)->update([
            'qty' => $this->qty,
            'total' => $total,
            'berat' => $totalberat
        ]);
        $this->emit('updateSub');
        $this->emit('Unselect');
        $this->emit('emptyResponse');
    }

    public function kurang(){
        $totalberat = $this->berat / $this->qty;
        $this->qty -= 1;
        $total = $this->harga * $this->qty;
        $this->berat = $totalberat;
        $this->total = $total;
        Cart::where('id' , $this->idcart)->update([
            'qty' => $this->qty,
            'total' => $total,
            'berat' => $totalberat
        ]);
        $this->emit('updateSub');
        $this->emit('Unselect');
        $this->emit('emptyResponse');
    }

    public function hapus(){
        Cart::destroy($this->idcart);
        $this->hapus = true;
        $this->emit('updateSub');
    }

    public function render()
    {
        return view('livewire.edit-qty' , [
            'qty' => $this->qty,
            'total' => $this->total,
            'namabarang' => $this->namabarang,
            'gambar' => $this->gambar,
            'hapus' => $this->hapus,
            'berat' => $this->berat
        ]);
    }
}
