<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\CurrentCustomer;
class CustomerController extends Controller
{
    //
    public function store(Request $request) {
      $customer_name = $request -> name ;
      $customer_phone = $request -> phone ;
      if($request->hasFile('img_path')){
        $file_name = 'test.png';
        $file_path = $request->file('img_path') ->storeAs('public/uploads/'.$customer_name, $file_name, 'local');
    }   
       $img_path = $file_path; 
       $customer = Customer::create(
        ['name' => $request -> name,
         'phone_number' => $request -> phone,
         'land_mark' => $img_path
       ]);
    }

    //find customer in databse
    public function index(Request $request){
      $arr_name = [];
      $count =0;
      $customers = Customer::all();
      foreach($customers as $customer){
          $arr_name[$count]= $customer -> name; 
          $count += 1; 
        }    
      return response()->json($arr_name);

    }
    
        // showname_navbar
    public function showName(Request $request)
    {
          $user = Auth::user()->name;
          return $user;
    }

    //show current customer
    public function show_cus_name(Request $request){ 
          $name_send = $request['text_res'];
          $lens =strlen($name_send);
          $name_cus = substr($name_send,0,$lens-7);
          $current_customer = CurrentCustomer::find(1);
         if( $current_customer ){
          $current_customer -> name =  $name_cus;
          $current_customer -> gender = $request['gender'];
          $current_customer -> age = $request['age'];
          $current_customer -> save();
         }
         else{
          $current_customer = CurrentCustomer::create(['name' => $name_cus, 'age' =>  $request['age'], 'gender' =>  $request['age']]);
         }
    }
}
