<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function BarangRekomendasi(){
        return $this->hasMany(BarangRekomendasi::class);
    }
}
