<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['remains','start_count','role','status'];
    function services_name(){
        return $this->belongsTo('App\Models\Services','services','id');
    }
}
