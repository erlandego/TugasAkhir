<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class UpdateSubtotal extends Component
{
    public $userid;
    public $shipping;
    protected $listeners = ['updateSub' => 'render' , 'ubahShippingprice' => 'ubahShippingprice'];

    public function mount($userid){
        $this->userid = $userid;
    }

    public function ubahShippingprice($paket){
        $this->shipping = $paket;
    }

    public function render()
    {
        $listcart = Cart::where('user_id' , '=' , $this->userid)->get();
        $total = 0;
        foreach ($listcart as $value) {
            $total += $value->total;
        }

        return view('livewire.update-subtotal' , [
            'subtotal' => $total,
            'shipping' => $this->shipping,
        ]);
    }
}
