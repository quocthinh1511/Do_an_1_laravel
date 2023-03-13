<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function store(Request $request) {
      $customer_name = $request -> name ;
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
         info($customer);
    
    }
    public function index(Request $request){
      $arr_name = [];
      $count =0;
      $customers = Customer::all();
      info($customers);
      foreach($customers as $customer){
          $arr_name[$count]= $customer -> name ; 
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
}
