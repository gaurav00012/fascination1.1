<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    //

    public function index()
    {
    	$banner = DB::select("select count(*) as banner_count from banners");
    	$user = DB::select("select count(*) as user_count from users where user_type = 3");
    	$coupon = DB::select("select count(*) as coupon_count from coupon_code");
    	$shopadmin = DB::select("select count(*) as shopadmin_count from users where user_type = 2");
    	//dd($banner[0]->banner_count);
    	return view("admin.dashboard",["banner"=>$banner,'user'=>$user,'coupon'=>$coupon,'shopadmin'=>$shopadmin]);
    }
}
