<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hjual extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function Djual(){
        return $this->hasMany(Djual::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Provinsi(){
        return $this->belongsTo(Provinsi::class);
    }

    public function City(){
        return $this->belongsTo(City::class);
    }

    public function Kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }

    public function address(){
        return $this->belongsTo(address::class);
    }
}
