<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadFile;
use App\Banner;
use Carbon\Carbon;

class BannerController extends Controller
{
    public $successStatus = 200;

    // public function index(){
    //     $getallBanners = Banner::select('banner_url')->get();
    //     $bannerArray = array();
    //     $url = array();
    //     foreach($getallBanners as $key => $banner)
    //     {
    //        $url[$key] = asset('images/banner/'.$banner->banner_url);
    //         //array_push($bannerArray,$url);
    //     }
        
    //    $success['banners'] = json_encode($bannerArray);
    //     return response()->json(['success'=>$url,$this->successStatus]);
    //     //print_r (json_encode($bannerArray));
    // }

    public function index()
    {
         return view("admin.banner.create");
    }

    public function getallbanner()
    {
        return Banner::all();
    }


    public function store(Request $request)
    {
        //

        $this->validate($request,[
           
            'bannerImage' => 'required',
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
    
           
            $couponImage = $request->file('bannerImage');
            $imageExtension = $couponImage->getClientOriginalExtension();
            $dir = 'assets/banners/';
            $filename = 'banner'.'_'.time().'_'.date('Ymd').'.'.$imageExtension;
            $imageUrl = env('APP_URL').'/assets/banners/'.$filename;

            $banner = new Banner;
            $banner->banner_url = $imageUrl;
            $banner->active_status = 1;
            
            $request->file('bannerImage')->move($dir, $filename);
            $banner->save();

            return 'banner_created';
            // return response()->json(['success'=>$success],$this->successStatus);
    }

    public function uploadBanner(Request $request){
        $this->validate($request,[
            'image' => 'required',
        ]);
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/banner'), $imageName);
        $banner = new Banner();
        $banner->banner_url = $imageName;
        $banner->active_status = 1;
        $banner->save();
    	return response()->json(['success'=>'You have successfully upload image.']);
       
        
     
    }

     public function destroy($id)
    {
         $banner = Banner::find($id);
        $filepath = 'assets/banners/'.$banner->banner_url;
        unlink($filepath);
        if($banner->delete())
        {
          return response()->json('bannerdeleted');
        }
    }
}       
