<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    function index(Subject $subject){
        return view('subjects.index', ['subjects' => Subject::All()]);
    }

    function show(Subject $subject){
        return view('subjects.show', compact(['subject']));
    }

    function adminIndex(Subject $subject){
        $this->authorize('view', $subject);
        return view('admin.subjects.index', ['subjects' => Subject::Paginate(10)]);
    }
    
    function create(Subject $subject){
        $this->authorize('create', $subject);
        return view('admin.subjects.create');
    }

    function edit(Subject $subject){
        $this->authorize('update', $subject);
        return view('admin.subjects.edit', compact(['subject']));
    }

    function store(StoreSubjectRequest $request)
    {
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->practical_hours = $request->practical_hours;
        $subject->theory_hours = $request->theory_hours;
        $subject->selfstudy_hours = $request->selfstudy_hours;
        $subject->teacher = $request->teacher;
        $subject->period = $request->period;
        $subject->save();
        return redirect('/admin/subjects')->with('succes', 'Vak succesvol aangemaakt.');
    }

    function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->practical_hours = $request->practical_hours;
        $subject->theory_hours = $request->theory_hours;
        $subject->selfstudy_hours = $request->selfstudy_hours;
        $subject->teacher = $request->teacher;
        $subject->period = $request->period;
        $subject->update();
        return redirect('/admin/subjects')->with('succes', 'Vak succesvol bewerkt.');
    }

    function destroy(Request $request, Subject $subject)
    {
        $this->authorize('delete', $subject);
        $subject->delete();
        return back()->with('succes', 'Vak succesvol verwijderd.');
    }

    public function searchIndex(Subject $subject, Request $request)
    {
        $this->authorize('view', $subject);
        $subjects = Subject::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.subjects.index', ['subjects' => $subjects, 'search_term' => $request->search_term]);
    }
}
