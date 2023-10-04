<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Carbon\Carbon;

class UpdateSubtotal extends Component
{
    public $userid;
    public $shipping;
    public $totalall;
    public $listbeli;
    public $todaydate;
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
        $list = [];

        //Ubah total setelah penambahan qty
        foreach ($listcart as $value) {
            $total += $value->total;
        }

        //Menambahkan list beli
        foreach ($listcart as $value) {
            array_push($list , $value);
        }

        $this->listbeli = implode("|" , $list);
        $this->totalall = $total + $this->shipping;
        $this->todaydate = Carbon::now()->setTimezone("Asia/Jakarta")->format('d/m/y h:m');

        return view('livewire.update-subtotal' , [
            'subtotal' => $total,
            'shipping' => $this->shipping,
            'totalall' => $this->totalall,
            'listbeli' => $this->listbeli,
            'todaydate' => $this->todaydate
        ]);
    }
}
