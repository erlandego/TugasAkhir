<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Djual extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function Hjual(){
        return $this->belongsTo(Hjual::class);
    }

    public function Barang(){
        return $this->belongsTo(Barang::class);
    }
}
