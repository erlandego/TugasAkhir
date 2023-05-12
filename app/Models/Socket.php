<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Merk(){
        return $this->belongsTo(Merk::class);
    }

    public function Barang(){
        return $this->hasMany(Barang::class);
    }
}
