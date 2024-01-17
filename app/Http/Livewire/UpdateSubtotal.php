<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Voucher;
use Carbon\Carbon;

class UpdateSubtotal extends Component
{
    public $userid;
    public $shipping;
    public $totalall;
    public $listbeli;
    public $todaydate;
    public $addresspilihan;
    public $paket;
    public $kurir;
    public $potongan;
    public $kodevoucher;
    public $vouchers;
    public $vouchercheck;
    protected $listeners = ['updateSub' => 'render' , 'ubahShippingprice' => 'ubahShippingprice'];

    public function mount($userid , $addresspilihan){
        $this->userid = $userid;
        $this->addresspilihan = $addresspilihan;
        $this->kurir = "";
        $this->potongan = 0;
        $this->vouchers = Voucher::all();
    }

    public function ubahShippingprice($paket , $kurir){
        $arrtemp = explode('|',$paket);
        $this->shipping = $arrtemp[0];
        $this->paket = $arrtemp[1];
        $this->kurir = $kurir;
    }

    public function kupon(){
        foreach ($this->vouchers as $value) {
            if($value->kode_voucher == $this->kodevoucher){
                $this->potongan = $value->potongan;
                $this->vouchercheck = true;
            }
        }
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
            array_push($list , $value->id);
        }

        $this->listbeli = implode("|" , $list);
        $this->totalall = $total + $this->shipping;
        $this->todaydate = Carbon::now()->setTimezone("Asia/Jakarta")->format('d/m/y h:m');

        if($this->vouchercheck == true){
            $this->totalall -= $this->potongan;
        }

        return view('livewire.update-subtotal' , [
            'subtotal' => $total,
            'shipping' => $this->shipping,
            'totalall' => $this->totalall,
            'listbeli' => $this->listbeli,
            'todaydate' => $this->todaydate,
            'addresspilihan' => $this->addresspilihan,
            'paket' => $this->paket,
            'kurir' => $this->kurir,
            'potongan' => $this->potongan,
            'vouchercheck' => $this->vouchercheck
        ]);
    }
}
