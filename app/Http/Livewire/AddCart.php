<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class AddCart extends Component
{
    public $tes;
    public $barang;
    public $user;

    public function mount($barang , $user){
        $this->barang = $barang;
        $this->user = $user;
        $this->tes = false;
    }

    public function addtocart(){
        Cart::create([
            "user_id" => $this->user,
            "barang_id" => $this->barang,
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
