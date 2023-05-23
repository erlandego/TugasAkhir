<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditImage extends Component
{
    use WithFileUploads;
    public $images;
    public $image;
    public $idbarang;
    public $berhasil;

    public function mount($idbarang){
        $this->idbarang = $idbarang;
        $this->berhasil = false;
    }

    public function updatedImage(){
        $validatedData = [];

        $this->validate([
            'image' => 'image'
        ]);

        $validatedData['image'] = $this->image->store('barang-images');
        $validatedData['id_barang'] = $this->idbarang;
        Image::create($validatedData);
    }

    public function hapusgambar($idgambar){
        $listimg = Image::find($idgambar);
        $pathimg = $listimg->image;
        Storage::delete($pathimg);
        Image::destroy($idgambar);
        $this->berhasil = true;
    }

    public function render()
    {
        $this->images = Image::where('id_barang', '=' , $this->idbarang)->get();
        return view('livewire.edit-image' ,[
            "images" => $this->images,
            "berhasil" => $this->berhasil,
        ]);
    }
}
