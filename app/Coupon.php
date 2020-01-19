<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $table = 'coupon_code';
    protected $primaryKey = 'id';
    protected $fillable = [
        'coupon_name', 'coupon_detail', 'coupon_image',
    ];
    
}
