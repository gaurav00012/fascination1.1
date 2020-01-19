<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopkeeper extends Model
{
    //
    protected $fillable = [
        'user_id','store_name','phone_no','status','created_by','updated_by'
    ];

     protected $primaryKey = 'user_id';

    public function user(){
        //return 
        return $this->belongsTo('App\User','id','user_id');
    }
}
