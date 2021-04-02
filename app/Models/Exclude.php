<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exclude extends Model
{
    use HasFactory;
    
    protected $casts = [
        'countries' => 'object',
        'currencies' => 'object',
    ];
}
