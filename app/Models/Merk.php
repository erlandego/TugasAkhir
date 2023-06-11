<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Merk extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ["id"];

    public function Barang(){
        return $this->belongsTo(Barang::class);
    }

    public function MerkCategory(){
        return $this->hasMany(MerkCategory::class);
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
