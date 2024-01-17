<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PilihRekomendasi extends Component
{
    public $pilihrekomendasi;
    public $rekomendasi;
    public $paketgaming;
    public $pakethome;
    public $paketdesign;
    public $paketschool;

    public function mount(){
        $this->pilihrekomendasi = false;
        $this->paketgaming = ["High Spec" , "Mid Range" , "Low Budget"];
        $this->pakethome = ["Multi Tasking" , "Browsing and Watch"];
        $this->paketdesign = ["Graphic Designer" , "Video Editor" , "Animator"];
        $this->paketschool = ["Elementary" , "Highschool" , "University"];
    }

    public function pilih($rekomendasi){
        $this->pilihrekomendasi = true;
        $this->rekomendasi = $rekomendasi;
    }

    public function render()
    {
        return view('livewire.pilih-rekomendasi', [
            'pilihrekomendasi' => $this->pilihrekomendasi,
            'rekomendasi' => $this->rekomendasi,
            'paketgaming' => $this->paketgaming,
            'pakethome' => $this->pakethome,
            'paketdesign' => $this->paketdesign,
            'paketschool' => $this->paketschool
        ]);
    }
}
