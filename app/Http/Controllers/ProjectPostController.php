<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectPost;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectPosts_Users;
use App\Http\Requests\StoreProjectPostRequest;
use App\Http\Requests\UpdateProjectPostRequest;

class ProjectPostController extends Controller
{
    function adminIndex(ProjectPost $projectpost){
        $this->authorize('view', $projectpost);
        return view('admin.projectposts.index', ['projectposts' => ProjectPost::Paginate(10), 'projects' => Project::with('projectposts')->get()]);
    }
    
    function create(ProjectPost $projectpost){
        $this->authorize('create', $projectpost);
        return view('admin.projectposts.create', ['users' => User::All(), 'projects' => Project::All()]);
    }

    function edit(ProjectPost $projectpost){
        $this->authorize('update', $projectpost);
        return view('admin.projectposts.edit', ['projectpost' => $projectpost, 'users' => User::All(), 'projects' => Project::All()]);
    }

    function store(StoreProjectPostRequest $request)
    {
        $projectpost = new ProjectPost;
        $projectpost->name = $request->name;
        $projectpost->intro = $request->intro;
        $projectpost->description = $request->description;
        $projectpost->project_id = $request->project;
        $fileName = time() . '.' . $request->picture->extension();
        $file = $request->file('picture');
        $projectpost->picture = $fileName;
        $projectpost->save();
        $file->move(('/home/lara/public_html/images/projectposts/' . $projectpost->id), $fileName);
        return redirect('/admin/projectposts')->with('succes', 'ProjectPost succesvol aangemaakt.');
    }

    function update(UpdateProjectPostRequest $request, ProjectPost $projectpost)
    {
        $projectpost->name = $request->name;
        $projectpost->intro = $request->intro;
        $projectpost->description = $request->description;
        $projectpost->project_id = $request->project;

        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $path = public_path() . '/images/projects/' . $projectpost->id . '/'. $projectpost->picture .' ';
            $projectpost->picture = $fileName;
        }
        if(isset($file)){
            if(NULL !== $projectpost->picture){
                unlink('/home/lara/public_html/images/projectposts/' . $projectpost->id . '/'. $projectpost->picture .'');
            }

            $file->move(('/home/lara/public_html/images/projectposts/' . $projectpost->id), $fileName);
        }
        $projectpost->update();
        return redirect('/admin/projectposts')->with('succes', 'ProjectPost succesvol bewerkt.');
    }

    function destroy(Request $request, ProjectPost $projectpost)
    {
        $this->authorize('delete', $projectpost);
        $projectpost->delete();
        return back()->with('succes', 'ProjectPost succesvol verwijderd.');
    }

    public function searchIndex(ProjectPost $projectpost, Request $request)
    {
        $this->authorize('view', $projectpost);
        $projectposts = ProjectPost::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.projectposts.index', ['projectposts' => $projectposts, 'search_term' => $request->search_term]);
    }

    public function indexFilter(ProjectPost $projectpost, Request $request)
    {
        $this->authorize('view', $projectpost);
        if($request->project_filter == 0){
            return redirect('admin/projectposts');
        }
        $projectposts = ProjectPost::where('project_id', $request->project_filter)->paginate(12);

        return view('admin.projectposts.index', ['projectposts' => $projectposts, 'project_filter' => $request->project_filter, 'projects' => Project::with('projectposts')->get()]);
    }
}