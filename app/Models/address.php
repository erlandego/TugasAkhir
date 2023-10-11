<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function User(){
        return $this->BelongsTo(User::class);
    }

    public function Kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }

    public function City(){
        return $this->belongsTo(City::class);
    }

    public function Provinsi(){
        return $this->belongsTo(Provinsi::class);
    }

    public function Hjual(){
        return $this->hasMany(Hjual::class);
    }
}
