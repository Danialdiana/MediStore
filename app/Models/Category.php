<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['category'];

    public function types(){
        return $this->hasMany(Type::class);
    }

    public function preparats(){
        return $this->hasMany(Preparat::class);
    }
}
