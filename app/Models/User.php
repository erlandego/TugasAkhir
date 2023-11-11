<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ["id"];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses(){
        return $this->hasMany(address::class);
    }

    public function Cart(){
        return $this->hasMany(Cart::class);
    }

    public function Hjual(){
        return $this->hasMany(Hjual::class);
    }

    public function Rakitan(){
        return $this->hasMany(Rakitan::class);
    }

    public function scopeFilter($query , array $filters){

        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('name' , 'like' , '%' . $filters["search"] . '%')
        //         ->orWhere('email' , 'like' , '%' . $filters["search"] . '%');
        // }

        $query->when($filters['search'] ?? false , function($query , $search){
            return $query->where('name' , 'like' , '%' . $search . '%')
            ->orWhere('email' , 'like' , '%' . $search . '%');
        });

        $query->when($filters['coba'] ?? false , function($query , $search){
            return $query->where('name' , 'like' , '%' . $search . '%')
            ->orWhere('email' , 'like' , '%' . $search . '%');
        });
    }

}
