<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
class FileController extends Controller
{
    public function upload_img(Request $request){

        $request->validate([
            'path' => 'required|mimes:jpg,jpeg,png|max:2048'
         ]);

         $user_id = Auth::user()->id;
         $user = User::where('id',$user_id )->first();
         $now = Carbon::now()->toDateString();


         if($request->hasFile('path')){
            $file_name = time().'_'. $request->file('path')->getClientOriginalName();
            $file_path = $request->file('path') ->storeAs('data/profile_image/'.$now, $file_name, 'public');
            info($file_path);
         }
         $user -> profile_image_url =  $file_path ; 
         $user ->save();
    }
    public function show_img(Request $request){ 
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $user = User::where('id',$user_id )->first();
        $url =  $user -> profile_image_url ; 
        $url_send = 'storage/'.$url;
        $data = [$url_send,$name];
        return response() -> json($data);
    }
}
