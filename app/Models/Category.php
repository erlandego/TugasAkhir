<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory , Sluggable;
    protected $guarded = ['id'];

    public function Barang(){
        return $this->hasMany(Barang::class);
    }

    public function MerkCategory(){
        return $this->hasMany(MerkCategory::class);
    }

    public function ImageCat(){
        return $this->hasMany(ImageCat::class);
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
