<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentCustomer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(CurrentCustomer::find(1)){
            $customer = CurrentCustomer::find(1);
            $name_cus = $customer -> name;
            $age = $customer -> age;
            $gender = $customer -> gender;
        }
        else{
            $name_cus = null;
            $age = null ; 
            $gender = null;
        }
        

        return view('home', compact('name_cus','age','gender'));
    }
}
