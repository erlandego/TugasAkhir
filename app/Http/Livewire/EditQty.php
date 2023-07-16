<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class EditQty extends Component
{
    public $qty;
    public $qty2;
    public $idcart;
    public $harga;
    public $total;

    public function mount($qty , $idcart , $harga , $total){
        $this->qty = $qty;
        $this->qty2 = $qty;
        $this->idcart = $idcart;
        $this->harga = $harga;
        $this->total = $total;
    }

    public function tambah(){
        $this->qty += 1;
        $total = $this->harga * $this->qty;
        $this->total = $total;
        Cart::where('id' , $this->idcart)->update([
            'qty' => $this->qty,
            'total' => $total
        ]);

        $this->emit('ubah_total' , ['total' => $total]);
    }

    public function kurang(){
        $this->qty -= 1;
        $total = $this->harga * $this->qty;
        $this->total = $total;
        Cart::where('id' , $this->idcart)->update([
            'qty' => $this->qty,
            'total' => $total
        ]);

        $this->emit('ubah_total' , ['total' => $total]);
    }

    public function render()
    {
        return view('livewire.edit-qty' , [
            'qty' => $this->qty,
            'total' => $this->total,
        ]);
    }
}
