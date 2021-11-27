<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFund extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    function user_name(){
        return $this->belongsTo('App\Models\User','user_id','id');
     }
     function fund(){
        return $this->belongsTo('App\Models\Fund','user_id','id');
    }
}
