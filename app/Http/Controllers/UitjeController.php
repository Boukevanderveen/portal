<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UitjeController extends Controller
{
    public function uitje(){
        if (auth()->user()->type == 'admin') {
            return view('admin/admin_uitjes');
        } else {
            return view('user/uitjes');
        }    
    }
}
