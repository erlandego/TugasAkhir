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

    public function mount(){
        $this->berhasil = false;
    }

    public function updatedImage(){
        $validatedData = [];

        $this->validate([
            'image' => 'image'
        ]);

        $validatedData['image'] = $this->image->store('barang-images');
        $validatedData['id_barang'] = null;
        Image::create($validatedData);
         $this->images = Image::where('id_barang', '=' , null)->get();
    }

    public function render()
    {
        return view('livewire.upload-image',[
            "images" => $this->images,
            "berhasil" => $this->berhasil
        ]);
    }
}
