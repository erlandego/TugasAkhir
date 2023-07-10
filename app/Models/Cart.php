<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function Barang(){
        return $this->hasMany(Barang::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
