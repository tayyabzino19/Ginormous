<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'currency' => 'object',
        'budget' => 'object',
        'upgrades' => 'object',
        'bid_stats' => 'object',
        'employer_reputation' => 'object'
    ];

    public function ProjectDetail(){
        return $this->hasOne(ProjectDetail::class);
    }

    public function ProjectProposals(){
        return $this->hasMany(ProjectProposal::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
