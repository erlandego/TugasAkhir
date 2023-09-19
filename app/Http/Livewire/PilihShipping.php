<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PilihShipping extends Component
{
    public $shipping;
    protected $response;
    public $provinsi;
    public $kabupaten;
    public $berat;
    public $checkutama;

    public function mount($provinsi , $kabupaten , $berat , $checkutama){
        $this->shipping = "";
        $this->provinsi = $provinsi;
        $this->kabupaten = $kabupaten;
        $this->berat = $berat * 1000;
        $this->checkutama = $checkutama;
    }

    public function updatedShipping(){
        if($this->checkutama == true){
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "origin=444&destination=".$this->kabupaten."&weight=".$this->berat."&courier=".$this->shipping,
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 75d865264b1f6579f82b21fc982b73f4"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $response2 = json_decode($response);

            $this->response = $response2;
            $this->emit('pilihPaket' , $this->response);
        }else{
            session()->flash('message', 'Alamat utama belum di tentukan');
        }
    }

    public function render()
    {
        return view('livewire.pilih-shipping' , [
            'shipping' => $this->shipping,
            'response' => $this->response,
            'berat' => $this->berat
        ]);
    }
}
