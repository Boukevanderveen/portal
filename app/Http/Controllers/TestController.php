<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;

class TestController extends Controller
{
    function index(Test $test){
        $this->authorize('view', $test);
        return view('tests.index', ['tests' => Test::All()]);
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
        $test->update();
        return redirect('/admin/tests')->with('succes', 'Toets succesvol bewerkt.');
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
