<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    function user_name(){
       return $this->belongsTo('App\Models\User','user_id','id');
    }
    function service(){
        return $this->belongsTo('App\Models\Services','id','category_id');
    }
}
