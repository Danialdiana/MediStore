<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['content','preparat_id'];

    public function preparat(){
        return $this->belongsTo(Preparat::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
