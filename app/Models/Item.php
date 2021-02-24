<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($value)
    {
        return date('d M Y',strtotime($value));
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    public function industries(){
        return $this->belongsToMany(Industry::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }
}
