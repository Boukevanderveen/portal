<?php

namespace App\Http\Controllers;
use App\Models\Elective;
use Illuminate\Http\Request;
use App\Http\Requests\StoreElectiveRequest;
use App\Http\Requests\UpdateElectiveRequest;

class ElectiveController extends Controller
{

    function index(Elective $elective){
        return view('electives.index', ['electives' => Elective::All()]);
    }

    function show(Elective $elective){
        return view('electives.show', compact(['elective']));
    }

    function adminIndex(Elective $elective){
        $this->authorize('view', $elective);
        return view('admin.electives.index', ['electives' => Elective::Paginate(10)]);
    }
    
    function create(Elective $elective){
        $this->authorize('create', $elective);
        return view('admin.electives.create');
    }

    function edit(Elective $elective){
        $this->authorize('update', $elective);
        return view('admin.electives.edit', compact(['elective']));
    }

    function store(StoreElectiveRequest $request)
    {
        $elective = new Elective;
        $elective->name = $request->name;
        $elective->description = $request->description;
        $elective->code = $request->code;
        $elective->hours = $request->hours;
        $elective->teacher = $request->teacher;
        $elective->period = $request->period;
        $elective->save();
        return redirect('/admin/electives')->with('succes', 'Keuzedeel succesvol aangemaakt.');
    }

    function update(UpdateElectiveRequest $request, Elective $elective)
    {
        $elective->name = $request->name;
        $elective->description = $request->description;
        $elective->code = $request->code;
        $elective->hours = $request->hours;
        $elective->teacher = $request->teacher;
        $elective->period = $request->period;
        $elective->update();
        return redirect('/admin/electives')->with('succes', 'Keuzedeel succesvol bewerkt.');
    }

    function destroy(Request $request, Elective $elective)
    {
        $this->authorize('delete', $elective);
        $elective->delete();
        return back()->with('succes', 'Keuzedeel succesvol verwijderd.');
    }

    public function searchIndex(Elective $elective, Request $request)
    {
        $this->authorize('view', $elective);
        $electives = Elective::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.electives.index', ['electives' => $electives, 'search_term' => $request->search_term]);
    }
}
