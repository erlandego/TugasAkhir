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

    public function mount($qty , $idcart , $harga , $total , $namabarang , $gambar){
        $this->qty = $qty;
        $this->qty2 = $qty;
        $this->idcart = $idcart;
        $this->harga = $harga;
        $this->total = $total;
        $this->namabarang = $namabarang;
        $this->gambar = $gambar;
        $this->hapus = false;
    }

    public function tambah(){
        $this->qty += 1;
        $total = $this->harga * $this->qty;
        $this->total = $total;
        Cart::where('id' , $this->idcart)->update([
            'qty' => $this->qty,
            'total' => $total
        ]);
        $this->emit('updateSub');
    }

    public function kurang(){
        $this->qty -= 1;
        $total = $this->harga * $this->qty;
        $this->total = $total;
        Cart::where('id' , $this->idcart)->update([
            'qty' => $this->qty,
            'total' => $total
        ]);
        $this->emit('updateSub');
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
            'hapus' => $this->hapus
        ]);
    }
}
