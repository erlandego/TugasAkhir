<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Barang;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImage extends Component
{
    use WithFileUploads;
    public $images;
    public $image;
    public $berhasil;
    public $dariedit;
    public $barang;

    public function mount($dariedit, $barang){
        $this->berhasil = false;
        $this->dariedit = $dariedit;
        $this->$barang = $barang;
    }

    public function updatedImage(){
        $validatedData = [];

        $this->validate([
            'image' => 'image'
        ]);

        $validatedData['image'] = $this->image->store('barang-images');
        $validatedData['id_barang'] = null;
        Image::create($validatedData);
    }

    public function render()
    {
        $this->images = Image::where('id_barang', '=' , null)->get();
        return view('livewire.upload-image',[
            "images" => $this->images,
            "berhasil" => $this->berhasil,
            "barang2" => $this->barang
        ]);
    }
}
