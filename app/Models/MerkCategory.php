<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkCategory extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function Merk(){
        return $this->belongsTo(Merk::class);
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
