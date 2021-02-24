<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($value)
    {
        return date('d M Y',strtotime($value));
    }

    public function items(){
        return $this->belongsToMany(Item::class);
    }
}
