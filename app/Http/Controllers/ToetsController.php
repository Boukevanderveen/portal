<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToetsController extends Controller
{
    public function toets(){
        if (auth()->user()->type == 'admin') {
            return view('admin/admin_toetsen');
        } else {
            return view('user/toetsen');
        }    
    }
}