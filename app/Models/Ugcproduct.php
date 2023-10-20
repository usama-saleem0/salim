<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ugcproduct extends Model
{
    use HasFactory;

    public function ugc()
    {
        return $this->belongsTo(Ugccampaign::class ,'campaign_id', 'id');
    
    }
}
