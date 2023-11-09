<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class ProjectController extends Controller
{
    function index(Project $project){
        $this->authorize('view', $project);
        return view('projects.index', ['projects' => Project::All()]);
    }

    function adminIndex(Project $project){
        $this->authorize('view', $project);
        return view('admin.projects.index', ['projects' => Project::Paginate(10)]);
    }
    
    function create(Project $project){
        $this->authorize('create', $project);
        return view('admin.projects.create');
    }

    function edit(Project $project){
        $this->authorize('update', $project);
        return view('admin.projects.edit', compact(['project']));
    }

    function store(StoreProjectRequest $request)
    {
        $project = new Project;
        $project->name = $request->name;
        $project->link = $request->link;
        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $project->picture = $fileName;
        }
        $project->save();
        if(isset($file)){
            $file->move(public_path('/images/projects/' . $project->id), $fileName);
        }
        return redirect('/admin/projects')->with('succes', 'Project succesvol aangemaakt.');
    }

    function update(UpdateProjectRequest $request, Project $project)
    {
        // Verwijder folder inhoud waar project id?
        $project->name = $request->name;
        $project->link = $request->link;

        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $path = public_path() . '/images/projects/' . $project->id . '/'. $project->picture .' ';
            dd(File::delete(public_path('/images/projects/' . $project->id), $fileName));
            $project->picture = $fileName;
        }
        if(isset($file)){
            $file->move(public_path('/images/projects/' . $project->id), $fileName);
        }
        $project->update();
        return redirect('/admin/projects')->with('succes', 'Project succesvol bewerkt.');
    }

    function destroy(Request $request, Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return back()->with('succes', 'Project succesvol verwijderd.');
    }

    public function searchIndex(Project $project, Request $request)
    {
        $this->authorize('view', $project);
        $projects = Project::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.projects.index', ['projects' => $projects, 'search_term' => $request->search_term]);
    }
}
