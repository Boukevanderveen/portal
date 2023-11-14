<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    function adminIndex(){
        if(Auth::User()->isAdmin)
        {
            return view('admin.index');
        }
        else{
            return back();
        }
    }
}
