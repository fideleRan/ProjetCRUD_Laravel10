<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];
    public function scopeStatus($query)
    {
        return $query->where('status', 1)->get();
    }
    public function getStatusAttribute($attributes){
        return $this->getStatusOption()[$attributes]; 
    }

    public function getStatusOption()
    {
        return [
            '0' => 'inactive',
            '1' => 'active'
        ];
    }
    public function company()
    {
        // UN client appartient dans un seul entreprise 
        return $this->belongsTo('App\Models\Company');
    }
}
