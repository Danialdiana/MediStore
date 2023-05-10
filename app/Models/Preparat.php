<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparat extends Model
{
    use HasFactory;
    protected $fillable=['name','name_kz','name_ru','name_en','content','content_kz','content_ru','content_en','price','country','country_kz','country_en','country_ru','company','company_en','company_ru','company_kz','term','term_en','term_ru','term_kz','types_id','image','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function types(){
        return $this->hasMany(Type::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)
            ->withPivot('count','sales')
            ->withTimestamps();
    }

    public function subscribers(){
        return $this->belongsToMany(User::class,'preparat_user_like')->withTimestamps();
    }
}
