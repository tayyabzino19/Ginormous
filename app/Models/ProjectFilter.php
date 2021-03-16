<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFilter extends Model
{
    use HasFactory;

    protected $casts = [
        'project_type' => 'object',
        'hourly_price' => 'object',
        'fixed_price' => 'object',
        'listing_type' => 'object'
    ];

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    public function languages(){
        return $this->belongsToMany(Language::class);
    }
}
