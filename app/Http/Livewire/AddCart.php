<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class AddCart extends Component
{
    public $tes;
    public $barang;
    public $user;
    public $harga;
    public $berat;

    public function mount($barang , $user , $harga , $berat){
        $this->barang = $barang;
        $this->user = $user;
        $this->tes = false;
        $this->harga = $harga;
        $this->berat = $berat;
    }

    public function addtocart(){
        Cart::create([
            "user_id" => $this->user,
            "barang_id" => $this->barang,
            "rakitan_id" => null,
            "total" => $this->harga,
            "type" => "barang",
            "berat" => $this->berat,
            "qty" => 1
        ]);
        $this->tes = true;
    }

    public function render()
    {
        return view('livewire.add-cart' , [
            "tes" => $this->tes
        ]);
    }

}
