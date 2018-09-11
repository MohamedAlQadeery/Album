<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadImage($image,$dir='images'){
        $newImageName = time().'.'.$image->getClientOriginalExtension();
         $path =$image->move(public_path($dir),$newImageName);
         return $dir.'/'.$newImageName;

    }

    public function customLogout(){
         Auth::logout();
        return redirect()->route('login');

    }
}
