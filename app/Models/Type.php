<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable=['category_id','type'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function preparats(){
        return $this->hasMany(Preparat::class);
    }
}
