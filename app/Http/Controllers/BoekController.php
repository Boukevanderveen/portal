<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoekController extends Controller
{
    public function boek(){
        if (auth()->user()->type == 'admin') {
            return view('admin/admin_boekenlijst');
        } else {
            return view('user/boekenlijst');
        } 
    }  
}
