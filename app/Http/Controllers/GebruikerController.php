<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GebruikerController extends Controller
{
    public function gebruiker(){

    if (auth()->user()->type == 'admin') {
        return view('admin/admin_gebruikers');
    } else {
        return view('user/gebruikers');
    }    
}
}
