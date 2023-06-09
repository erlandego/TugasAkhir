<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ImageCat;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadImagecat extends Component
{
    use WithFileUploads;
    public $images;
    public $image;
    public $berhasil;
    public $dariedit;
    public $idcat;

    public function mount($dariedit, $idcat){
        $this->berhasil = false;
        $this->dariedit = $dariedit;
        $this->idcat = $idcat;
    }

    public function updatedImage(){
        $validatedData = [];

        $this->validate([
            'image' => 'image'
        ]);

        if($this->dariedit == false){
            //$hitung =
            $validatedData['image'] = $this->image->store('category-images');
            $validatedData['category_id'] = null;
            ImageCat::create($validatedData);
        }
        else{
            if($this->idbarang != null){
                $validatedData['image'] = $this->image->store('category-images');
                $validatedData['category_id'] = $this->idbarang;
                ImageCat::create($validatedData);
            }
        }
    }

    public function hapusgambar($idgambar){
        $listimg = ImageCat::find($idgambar);
        $pathimg = $listimg->image;
        Storage::delete($pathimg);
        ImageCat::destroy($idgambar);
    }

    public function render()
    {
        if($this->dariedit == true || $this->idcat != null){
            $this->images = ImageCat::where('category_id', '=' , $this->idcat)->get();
        }
        else if($this->dariedit == false || $this->idcat == null){
            $this->images = ImageCat::where('category_id', '=' , null)->get();
        }
        return view('livewire.upload-imagecat' , [
            'images' => $this->images
        ]);
    }
}
