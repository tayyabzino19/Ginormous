<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveFeed extends Model
{
    use HasFactory;

    protected $casts = [
        'currency' => 'object',
        'budget' => 'object',
        'upgrades' => 'object',
        'bid_stats' => 'object',
    ];
}
