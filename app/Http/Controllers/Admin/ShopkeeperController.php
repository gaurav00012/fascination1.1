<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Shopkeeper;

class ShopkeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $authuser = Auth::user();
       $shopkeeper = Shopkeeper::all();
     //  dd($shopkeeper);
        return view("admin.shopkeeper.create",['shopkeeper'=>$shopkeeper]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       $this->validate($request,[
           'storename' => 'required',
           'emailid' => 'required|email|unique:users,email',
           'mobileno' => 'required',
           //'username' => 'required',
           'password' => 'required',
        ]);

        $auth = Auth::user();
        $input = $request->post();

         $user['name'] = $input['storename'];
        $user['user_type'] = 2;
        $user['email'] = $input['emailid'];
        $user['password'] = bcrypt($input['password']);
        $user = User::create($user);

        $store['user_id'] = $user->id;
        $store['store_name'] = $input['storename'];
        $store['phone_no'] = $input['mobileno'];
        $store['status'] = '1';
        $store['created_by'] = 1;
        $store['updated_by'] = 1;
        $store = Shopkeeper::create($store);
        return response()->json('shopkeeperadded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getallshopkeeper()
    {
        return Shopkeeper::all();
    }
    
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
        $this->validate($request,[
            'storeadmin' => 'required',
            'mobile' => 'required',
         ]);

         $user = User::find($id);
         $user->name = $request->post('storeadmin');
         $user->save();
         $shopkeeper = Shopkeeper::find($user->id);
         // echo '<pre>';
         // print_r ($shopkeeper);
         // echo '</pre>';
         // die();
        
         $shopkeeper->store_name = $request->post('storeadmin');
         $shopkeeper->phone_no = $request->post('mobile');
         if($shopkeeper->save())  return response()->json('shopkeeperupdated');
         
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $userId = $user->id;
        $user->delete();
        $shopkeeper = Shopkeeper::find($userId);
        if($shopkeeper->delete())
        {
          return response()->json('shopkeeperdeleted');
        }
    }

    public function tests()
    {
        echo 'hell world';
    }
}
