<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    
    public function tractaments()
    {
        return $this->belongsToMany('App\Tractament', 'client_tractament', 'client_id', 'tractament_id');
    }
}
