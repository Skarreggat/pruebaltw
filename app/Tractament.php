<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tractament extends Model
{
    protected $table = 'tractaments';
    
    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }
}
