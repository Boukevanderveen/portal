<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projectweek;
use App\Models\User;
use App\Models\Projectweek_User;
use App\Http\Requests\StoreProjectweekRequest;
use App\Http\Requests\UpdateProjectWeekRequest;
use Auth;

class ProjectWeekController extends Controller
{

    function registrationsStore(Request $request, Projectweek $projectweek)
    {
        $Projectweek_User = new Projectweek_User;
        $Projectweek_User->projectweek_id = $projectweek->id;
        $Projectweek_User->user_id = Auth::User()->id;
        $Projectweek_User->save();
        return back()->with('succes', 'Succesvol ingeschreven');
    }

    function registrationsDestroy(Projectweek $projectweek)
    {
        Projectweek_User::where('projectweek_id', $projectweek->id)->where('user_id', Auth::User()->id)->delete();
        return back()->with('succes', 'Succesvol uitgeschreven');
    } 

    function adminIndex(Projectweek $projectweek){
        $this->authorize('view', $projectweek);
        return view('admin.projectweeks.index', ['projectweeks' => Projectweek::Paginate(10)]);
    }
    
    function create(Projectweek $projectweek){
        $this->authorize('create', $projectweek);
        return view('admin.projectweeks.create');
    }

    function edit(Projectweek $projectweek){
        $this->authorize('update', $projectweek);
        return view('admin.projectweeks.edit', compact(['projectweek']));
    }

    function store(UpdateProjectWeekRequest $request)
    {
        $projectweek = new Projectweek;
        $projectweek->name = $request->name;
        $projectweek->period = $request->period;
        $projectweek->week = $request->week;
        $projectweek->start_date = $request->start_date;
        $projectweek->end_date = $request->end_date;
        $projectweek->target_class = $request->target_class;
        $projectweek->registerable = $request->registerable;
        $projectweek->save();
        return redirect('/admin/projectweeks')->with('succes', 'Project week succesvol aangemaakt.');
    }

    function update(UpdateProjectWeekRequest $request, Projectweek $projectweek)
    {
        $projectweek->name = $request->name;
        $projectweek->period = $request->period;
        $projectweek->week = $request->week;
        $projectweek->start_date = $request->start_date;
        $projectweek->end_date = $request->end_date;
        $projectweek->target_class = $request->target_class;
        $projectweek->registerable = $request->registerable;
        if(!$projectweek->registerable){
            Projectweek_User::where('projectweek_id', $projectweek->id)->delete();
        }
        $projectweek->update();
        return redirect('/admin/projectweeks')->with('succes', 'Project week succesvol bewerkt.');
    }

    function registrationsIndex(Projectweek $projectweek){
        $this->authorize('view', $projectweek);
        $registrations = Projectweek_user::where('projectweek_id', $projectweek->id)->paginate(10); 	    
        $users = User::All();
        return view('admin.projectweeks.registrations.index', compact(['projectweek', 'users', 'registrations']));
    }

    function adminRegistrationsStore(Request $request, Projectweek $projectweek)
    {
        $this->authorize('create', $projectweek);
        Projectweek_User::where('projectweek_id', $projectweek->id)->delete();
        if(isset($request->user_ids)){
        foreach($request->user_ids as $user_id){
        if (Projectweek_User::where('user_id', $user_id)->exists()) {
        }
        else{
            $Projectweek_User = new Projectweek_User;
            $Projectweek_User->projectweek_id = $projectweek->id;
            $Projectweek_User->user_id = $user_id;
            $Projectweek_User->save();
        }
        }
        }
        return back()->with('succes', 'Project week succesvol bewerkt');
    }

    function adminRegistrationsDestroy(Projectweek $projectweek, Projectweek_User $registration)
    {
        $this->authorize('delete', $projectweek);
        $registration->delete();
        return back()->with('succes', 'Inschrijving succesvol verwijderd');
    }

    function destroy(Request $request, Projectweek $projectweek)
    {
        $this->authorize('delete', $projectweek);
        $projectweek->delete();
        return back()->with('succes', 'Project week succesvol verwijderd.');
    }

    public function searchIndex(Projectweek $projectweek, Request $request)
    {
        $this->authorize('view', $projectweek);
        $projectweek = Projectweek::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.projectweek.index', ['projectweeks' => $projectsweek, 'search_term' => $request->search_term]);
    }
}
