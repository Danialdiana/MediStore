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


    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'number',
        'year',
        'cvc',
        'summa'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function preparats(){
        return $this->belongsToMany(Preparat::class)
            ->withPivot('count','sales')
            ->withTimestamps();
    }

    public function preparatsWS($status){
        return $this->belongsToMany(Preparat::class)
            ->wherePivot('sales',$status)
            ->withPivot('count','sales')
            ->withTimestamps();
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function products(){
        return $this->belongsToMany(Preparat::class,'preparat_user_like')
            ->withTimestamps();
    }
}
