<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function City(){
        return $this->belongsTo(City::class);
    }

    public function Provinsi(){
        return $this->belongsTo(Provinsi::class);
    }

    public function address(){
        return $this->hasMany(address::class);
    }

    public function Hjual(){
        return $this->hasMany(Hjual::class);
    }
}
