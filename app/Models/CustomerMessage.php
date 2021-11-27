<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMessage extends Model
{
    use HasFactory;
    function user_name(){
        return $this->belongsTo('App\Models\User','user_id','id');
     }
     function andmin_name(){
        return $this->belongsTo('App\Models\User','admin_id','id');
     }
}
