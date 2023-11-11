<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drakitan extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function Rakitan(){
        return $this->belongsTo(Rakitan::class);
    }

    public function Barang(){
        return $this->belongsTo(Barang::class);
    }
}
