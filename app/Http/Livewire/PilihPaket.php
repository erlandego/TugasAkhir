<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PilihPaket extends Component
{
    public $paket;
    protected $response;
    public $checker;
    public $kabupaten;
    public $berat;
    public $shipping;
    public $courier;
    protected $listeners = ['pilihPaket' , 'emptyResponse' => 'emptyResponse'];

    public function mount(){
        $this->checker = false;
    }

    public function pilihPaket($response){
        $temp = (object)$response;
        $temp2 = json_encode($temp);
        $this->response = json_decode($temp2);
    }

    public function emptyResponse(){
        $this->response = null;
    }

    public function requlang($destination,$weight,$courier){

        $this->kabupaten = $destination;
        $this->berat = $weight;
        $this->courier = $courier;

        $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "origin=444&destination=".$destination."&weight=".$weight."&courier=".$courier,
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 75d865264b1f6579f82b21fc982b73f4"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $response2 = json_decode($response);

            $this->response = $response2;
    }

    public function updatedPaket(){
        $this->emit('ubahShippingprice' , $this->paket);
    }

    public function render()
    {
        return view('livewire.pilih-paket' , [
            'checker' => $this->checker,
            'response' => $this->response,
            'shipping' => $this->paket,
            'berat' => $this->berat,
            'kabupaten' => $this->kabupaten,
            'courier' => $this->courier,
        ]);
    }
}
