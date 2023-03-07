<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function store(Request $request) {
        $land_mark = $request -> land_mark; 
        $var  = gettype($land_mark);
        info($land_mark['unshiftedLandmarks']['_positions'][0]['_x']);
        info($var);
       $land_mark_save = $land_mark['unshiftedLandmarks']['_positions'];
       info($land_mark_save);
       $customer = Customer::create(
        ['name' => $request -> name,
         'phone_number' => $request -> phone_number,
         'land_mark' => $land_mark_save
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
          info($arr_name);
    
          return response()->json($arr_name);

        }
    
        // showname_navbar
        public function showName(Request $request)
        {
          $user = Auth::user()->name;
          return $user;
        }
}
