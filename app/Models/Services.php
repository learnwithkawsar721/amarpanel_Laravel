<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    function user_name(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
   
}
