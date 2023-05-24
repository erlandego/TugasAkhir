<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Barang;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadImage extends Component
{
    use WithFileUploads;
    public $images;
    public $image;
    public $berhasil;
    public $dariedit;
    public $idbarang;

    public function mount($dariedit, $idbarang){
        $this->berhasil = false;
        $this->dariedit = $dariedit;
        $this->idbarang = $idbarang;
    }

    public function updatedImage(){
        $validatedData = [];

        $this->validate([
            'image' => 'image'
        ]);

        if($this->dariedit == false){
            $validatedData['image'] = $this->image->store('barang-images');
            $validatedData['id_barang'] = null;
            Image::create($validatedData);
        }
        else{
            if($this->idbarang != null){
                $validatedData['image'] = $this->image->store('barang-images');
                $validatedData['id_barang'] = $this->idbarang;
                Image::create($validatedData);
            }
        }
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
        if($this->dariedit == true){
            $this->images = Image::where('id_barang', '=' , $this->idbarang)->get();
        }
        else{
            $this->images = Image::where('id_barang', '=' , null)->get();
        }
        return view('livewire.upload-image',[
            "images" => $this->images,
        ]);
    }
}
