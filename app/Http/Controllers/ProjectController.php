<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\SubProject;
use App\Models\ProjectPost;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class ProjectController extends Controller
{
    function index(Project $project){
        $projects = Project::All();
        return view('projects.index', ['projects' => Project::All()]);
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    function subprojectsShow(Project $project, SubProject $subproject){
        return view('projects.subprojects.show', ['project' => $project, 'subproject' => $subproject]);
    }

    function projectPostsShow(Project $project, ProjectPost $projectpost){
        return view('projects.projectposts.show', ['project' => $project, 'projectpost' => $projectpost]);
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
        $project->intro = $request->intro;
        $project->description = $request->description;
        $project->highlighted = $request->highlighted;        
        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $project->picture = $fileName;
        }
        $project->save();
        if(isset($file)){
            $file->move(('/home/lara/public_html/images/projects/' . $project->id), $fileName);
        }
        
        return redirect('/admin/projects')->with('succes', 'Project succesvol aangemaakt.');
    }

    function update(UpdateProjectRequest $request, Project $project)
    {
        $project->name = $request->name;
        $project->intro = $request->intro;
        $project->description = $request->description;        
        $project->highlighted = $request->highlighted;        

        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $path = public_path() . '/images/projects/' . $project->id . '/'. $project->picture .' ';
            $project->picture = $fileName;
        }
        if(isset($file)){

            if(NULL !== $project->picture){
                unlink('/home/lara/public_html/images/projects/' . $project->id . '/'. $project->getOriginal('picture') .'');
            }
            $file->move(('/home/lara/public_html/images/projects/' . $project->id), $fileName);
        }

        $project->update();
        return redirect('/admin/projects')->with('succes', 'Project succesvol bewerkt.');
    }

    function destroy(Request $request, Project $project)
    {
        $this->authorize('delete', $project);
        if(NULL !== $project->picture){
        unlink('/home/lara/public_html/images/projects/' . $project->id . '/'. $project->picture .'');
        }
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
