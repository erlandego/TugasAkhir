<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Socket extends Model
{
    use HasFactory , Sluggable;

    protected $guarded = ['id'];

    public function Merk(){
        return $this->belongsTo(Merk::class);
    }

    public function Barang(){
        return $this->hasMany(Barang::class);
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
