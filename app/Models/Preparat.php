<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparat extends Model
{
    use HasFactory;
    protected $fillable=['name','content','price','country','company','term','types_id','image','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function types(){
        return $this->hasMany(Type::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
