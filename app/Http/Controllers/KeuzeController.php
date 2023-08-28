<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeuzeController extends Controller
{
    public function keuze(){
        if (auth()->user()->type == 'admin') {
            return view('admin/admin_keuzedelen');
        } else {
            return view('user/keuzedelen');
        }    
    }
}
