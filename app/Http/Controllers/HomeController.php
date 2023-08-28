<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('user/dashboard');
    }
    
    /**
     * Show the application dashboard for admins.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // this function is being used for navigation
    // look in web.php for the line below
    //Route::get('redirects', 'App\Http\Controllers\HomeController@adminDashboard');
    public function adminDashboard()
    {
        // type is being used to retrieve admin/user role, database: users table.
        if (auth()->user()->type == 'admin') {
            return view('admin/admin_dashboard');
        } else {
            return view('user/dashboard');
        }       
    }
}
