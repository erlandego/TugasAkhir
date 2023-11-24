<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function City(){
        return $this->hasMany(City::class);
    }

    public function Kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }

    public function address(){
        return $this->hasMany(address::class);
    }

    public function Hjual(){
        return $this->hasMany(Hjual::class);
    }

    public function Provinsi(){
        return $this->hasMany(Provinsi::class);
    }
}
