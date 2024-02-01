<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Project;
use App\Models\Test;
use App\Models\Projectweek;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    function index(){
        $projects = Project::where('highlighted', 1)->get();
        $tests = Test::orderBy('date', 'ASC')->whereDate('date', '>=', now())->get();
        $projectweeks = Projectweek::orderBy('start_date', 'ASC')->whereDate('end_date', '>=', now())->get();
        $users = User::All();
        return view('index', compact(['projects', 'tests', 'projectweeks', 'users']));
    }

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
