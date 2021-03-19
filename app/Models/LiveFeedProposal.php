<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveFeedProposal extends Model
{
    use HasFactory;

    protected $casts = [
        'reputation' => 'object',
        'country' => 'object',
    ];
}
