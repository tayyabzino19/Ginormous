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
        'reputation' => 'object'
    ];


    public function LiveFeedDetail(){
        return $this->hasOne(LiveFeedDetail::class);
    }

    public function LiveFeedProposals(){
        return $this->hasMany(LiveFeedProposal::class);
    }
}
