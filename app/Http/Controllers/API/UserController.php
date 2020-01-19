<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use App\Coupon;
use App\Banner;
use App\Shopurl;
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{
    //
    public $successStatus = 200;

    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
                }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $input['user_type'] = 3;
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus); 
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 

    public function edituser(Request $request)
    {
        $user = Auth::user();
        $userdetail = User::findOrFail($user->id);
        $userdetail->name = $request->post('name');
        $userdetail->save();
        
        return response()->json(['success' => 'user_updated'], $this->successStatus);
    }

    public function couponlist()
    {
        $coupon = Coupon::all();
        return response()->json(['couponlist' => $coupon], $this->successStatus);
    }

    public function coupon(Request $request)
    {
       $couponpost = $request->post('coupon_id');
       $coupons = Coupon::where('id', $couponpost)->first();
        return response()->json(['coupon' => $coupons], $this->successStatus);
    }

    public function banner()
    {
        $banner = Banner::all();
        return response()->json(['bannerlist' => $banner], $this->successStatus);
    }

    public function shopurl()
    {
        $url = shopurl::all();
        return response()->json(['urls' => $url], $this->successStatus);
    }

    
}
