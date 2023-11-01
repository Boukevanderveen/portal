<?php

namespace App\Http\Controllers;
use App\Models\Test;
use App\Models\User;
use App\Models\Test_User;
use App\Models\Projectweek;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use Auth;

class TestController extends Controller
{
    function index(Test $test){

        return view('tests.index', ['tests' => Test::whereYear('date', date("Y"))->get(), 'projectweeks' => Projectweek::whereYear('start_date', date("Y"))->get(), 'currentyear' => 1]);
    }

    function indexLastYear(Test $test){
        return view('tests.index', ['tests' => Test::whereYear('date', date("Y")-1)->get(), 'projectweeks' => Projectweek::whereYear('start_date', date("Y")-1)->get(), 'currentyear' => 0]);
    }

    function registrationsStore(Request $request, Test $test)
    {
        $Test_User = new Test_User;
        $Test_User->test_id = $test->id;
        $Test_User->user_id = Auth::User()->id;
        $Test_User->save();
        return back()->with('succes', 'Succesvol ingeschreven');
    }

    function registrationsDestroy(Test $test)
    {
        Test_User::where('test_id', $test->id)->where('user_id', Auth::User()->id)->delete();
        return back()->with('succes', 'Succesvol uitgeschreven');
    } 

    function adminIndex(Test $test){
        $this->authorize('view', $test);
        return view('admin.tests.index', ['tests' => Test::All()]);
    }
    
    function create(Test $test){
        $this->authorize('create', $test);
        return view('admin.tests.create');
    }

    function edit(Test $test){
        $this->authorize('update', $test);
        return view('admin.tests.edit', compact(['test']));
    }

    function store(StoreTestRequest $request)
    {
        $test = new Test;
        $test->name = $request->name;
        $test->school_year = $request->school_year;
        $test->period = $request->period;
        $test->date = $request->date;
        $test->time = $request->time;
        $test->resit_date = $request->resit_date;
        $test->resit_time = $request->resit_time;
        $test->registerable = $request->registerable;
        $test->save();
        return redirect('/admin/tests')->with('succes', 'Toets succesvol aangemaakt.');
    }

    function update(UpdateTestRequest $request, Test $test)
    {
        $test->name = $request->name;
        $test->school_year = $request->school_year;
        $test->period = $request->period;
        $test->date = $request->date;
        $test->time = $request->time;
        $test->resit_date = $request->resit_date;
        $test->resit_time = $request->resit_time;
        $test->registerable = $request->registerable;
        if(!$test->registerable){
            Test_User::where('test_id', $test->id)->delete();
        }
        $test->update();
        return redirect('/admin/tests')->with('succes', 'Toets succesvol bewerkt.');
    }

    function registrationsIndex(Test $test){
        $this->authorize('view', $test);
        $registrations = Test_User::where('test_id', $test->id)->get(); 	    
        $users = User::All();
        return view('admin.tests.registrations.index', compact(['test', 'users', 'registrations']));
    }

    function adminRegistrationsStore(Request $request, Test $test)
    {
        $this->authorize('create', $test);
        Test_User::where('test_id', $test->id)->delete();
        foreach($request->user_ids as $user_id){
        if (Test_User::where('user_id', $user_id)->exists()) {
        }
        else{
            $Test_User = new Test_User;
            $Test_User->test_id = $test->id;
            $Test_User->user_id = $user_id;
            $Test_User->save();
        }
        }
        return back()->with('succes', 'Inschrijvingen succesvol bewerkt');
    }

    function adminRegistrationsDestroy(Test $test, Test_User $registration)
    {
        $this->authorize('delete', $test);
        $registration->delete();
        return back()->with('succes', 'Inschrijving succesvol verwijderd');
    } 

    function destroy(Request $request, Test $test)
    {
        $this->authorize('delete', $test);
        $test->delete();
        return back()->with('succes', 'Toets succesvol verwijderd.');
    }

    public function searchIndex(Test $test, Request $request)
    {
        $this->authorize('view', $test);
        $tests = Test::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.tests.index', ['tests' => $tests, 'search_term' => $request->search_term]);
    }
}
