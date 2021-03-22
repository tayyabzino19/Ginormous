<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveFeedDetail extends Model
{
    use HasFactory;

    protected $casts = [
        'jobs' => 'object',
        'attachments' => 'object',
        'status' => 'object',
        'reputation' => 'object',
        'country' => 'object',
    ];

    public function liveFeed(){
        return $this->belongsTo(LiveFeed::class);
    }
}
