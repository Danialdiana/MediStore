<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    use HasFactory;

    protected $table='preparat_user';

    protected $fillable=['preparat_id','user_id','count','sales'];

    public function preparat(){
        return $this->belongsTo(Preparat::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
