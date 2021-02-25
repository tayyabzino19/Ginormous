<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($value)
    {
        return date('d M Y',strtotime($value));
    }

    public function getLeaveDateAttribute($value)
    {
        return date('d M Y',strtotime($value));
    }

    public function getLeaveDateFromAttribute($value)
    {
        return date('d M Y',strtotime($value));
    }

    public function getLeaveDateToAttribute($value)
    {
        return date('d M Y',strtotime($value));
    }

    public function getLeaveTimeFromAttribute($value)
    {
        return date('g:i a',strtotime($value));
    }

    public function getLeaveTimeToAttribute($value)
    {
        return date('g:i a',strtotime($value));
    }


    public function user(){
        return $this->belongsTo(User::class);
    }


}
