<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
class ImageController extends Controller
{
    public function store(Request $request){ 
        //Store customer when taking photo
        $img = $request -> image;
       
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $customer_phone = $request -> phone_number;

        $customer_name = $request ->name;
        $fileName = 'test.png';
        //customer name la ten folder
       

        // $file = 'public/'.$folderPath. $fileName;
        $file = 'public/'.$folderPath.$customer_name.'/'. $fileName;
        Storage::put($file, $image_base64);
        $customer = Customer::create([
            'name' => $request -> name ,
            'phone_number' => $request -> phone_number
        ]);
    }
}