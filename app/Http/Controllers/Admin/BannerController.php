<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadFile;
use App\Banner;

use Carbon\Carbon;
class BannerController extends Controller
{
    public $successStatus = 200;

    public function index(){
        $getallBanners = Banner::select('banner_url')->get();
        $bannerArray = array();
        $url = array();
        foreach($getallBanners as $key => $banner)
        {
           $url[$key] = asset('images/banner/'.$banner->banner_url);
            //array_push($bannerArray,$url);
        }
        
       $success['banners'] = json_encode($bannerArray);
        return response()->json(['success'=>$url,$this->successStatus]);
        //print_r (json_encode($bannerArray));
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
}       
