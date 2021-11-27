<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTriket extends Model
{
    use HasFactory;
    protected $guarded=[];

    function user_name(){
        return $this->belongsTo('App\Models\User','user_id','id');
     }
    function user_message(){
        return $this->belongsTo('App\Models\CustomerMessage','id','tricat_id');
     }
}
