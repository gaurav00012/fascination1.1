<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Coupon;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $successStatus = 200;

    public function __construct(){
       // echo "hey this constructor";
    }

    public function index()
    {
        //
        
        $getAllCoupons = promocode::select('coupon_code','from_date','to_date','coupon_type','coupon_min_value','coupon_limit','coupon_for','product_name','product_link')->get();
        $success['allcoupons'] = $getAllCoupons;
        return response()->json(['success'=>$success,$this->successStatus]);
        
    }

    public function getallCoupon()
    {
        return Coupon::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.promocode.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // echo env('APP_URL').'/assets/coupons/coupon_1579545977_20200120.jpg';
        // die();
        $this->validate($request,[
            'couponName' => 'required',
            'couponDetail' => 'required',
            'couponImage' => 'required',
            // 'from_date' => 'required|date',
            // 'to_date' => 'required|date',
            // 'coupon_code' => 'required|unique:Promocodes',
            // 'coupon_type' => 'required',
            // 'coupon_value' => 'required',
            // 'coupon_min_value' => 'required',
            // 'coupon_max_value' => 'required',
            // 'coupon_limit' => 'required',
            // 'coupon_for' => 'required|in:opt,total,product',
            // 'product_name' => 'required_if:coupon_for,==,product',
            // 'product_link' => 'required_if:coupon_for,==,product',
            // 'comments' => 'required',
            //'created_by' => 'required'
            ''
           ]);
    
            $couponName = $request->couponName;
            $couponDetail = $request->couponDetail;
            $couponImage = $request->file('couponImage');
            $imageExtension = $couponImage->getClientOriginalExtension();
            $dir = 'assets/coupons/';
            $filename = 'coupon'.'_'.time().'_'.date('Ymd').'.'.$imageExtension;
            $imageUrl = env('APP_URL').'/assets/coupons/'.$filename;

            $coupon = new Coupon;
            $coupon->coupon_name = $couponName;
            $coupon->coupon_detail = $couponDetail;
            $coupon->coupon_image = $imageUrl;
            $request->file('couponImage')->move($dir, $filename);
            $coupon->save();

            return 'coupon_created';
            // return response()->json(['success'=>$success],$this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coupon = Coupon::find($id);
        $filepath = 'assets/coupons/'.$coupon->coupon_image;
        unlink($filepath);
        if($coupon->delete())
        {
          return response()->json('coupondeleted');
        }
        
    }

     public function useCoupon(Request $request){

       $validator = Validator::make($request->all(),[
        'email' => 'required|email',
        'promocode' => 'required'
       ]);
       
       if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
         

    }
}
