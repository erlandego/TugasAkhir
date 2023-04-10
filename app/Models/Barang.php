<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Barang extends Model
{
    use HasFactory , Sluggable;

    // public $table = "barang";
    protected $guarded = ['id'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Merk(){
        return $this->belongsTo(Merk::class);
    }

    public function Size(){
        return $this->belongsTo(Size::class);
    }

    public function Socket(){
        return $this->belongsTo(Socket::class);
    }

    public function Slot(){
        return $this->belongsTo(Slot::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
