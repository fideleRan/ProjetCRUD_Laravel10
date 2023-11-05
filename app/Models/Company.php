<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded=[];

    //Relation OneToMany
    public function customers()
    {
        //Un entreprise detient plusieurs clients
        return $this->hasMany('App\Models\Customer');
    }
}    
