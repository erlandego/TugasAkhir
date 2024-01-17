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

    public function Image(){
        return $this->hasMany(Image::class);
    }

    public function Cart(){
        return $this->hasMany(Cart::class);
    }

    public function Djual(){
        return $this->hasMany(Djual::class);
    }

    public function Drakitan(){
        return $this->hasMany(Drakitan::class);
    }

    public function BarangRekomendasi(){
        return $this->hasMany(BarangRekomendasi::class);
    }

    public function ArusKas(){
        return $this->hasMany(ArusKas::class);
    }

    public function Kunjungan(){
        return $this->hasMany(Kunjungan::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
