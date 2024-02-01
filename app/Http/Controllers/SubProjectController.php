<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubProject;
use App\Models\User;
use App\Models\Project;
use App\Models\SubProjects_Users;
use App\Http\Requests\StoreSubProjectRequest;
use App\Http\Requests\UpdateSubProjectRequest;


class SubProjectController extends Controller
{
    function adminIndex(SubProject $subproject){
        $this->authorize('view', $subproject);
        
        return view('admin.subprojects.index', ['subprojects' => Subproject::Paginate(10), 'projects' => Project::with('subprojects')->get()]);
    }
    
    function create(Subproject $subproject){
        $this->authorize('create', $subproject);
        return view('admin.subprojects.create', ['users' => User::All(), 'projects' => Project::All()]);
    }

    function edit(Subproject $subproject){
        $this->authorize('update', $subproject);
        return view('admin.subprojects.edit', ['subproject' => $subproject, 'users' => User::All(), 'projects' => Project::All()]);
    }

    function store(StoreSubProjectRequest $request)
    {
        $subproject = new Subproject;
        $subproject->name = $request->name;
        $subproject->intro = $request->intro;
        $subproject->description = $request->description;
        $subproject->project_id = $request->project;
        $fileName = time() . '.' . $request->picture->extension();
        $file = $request->file('picture');
        $subproject->picture = $fileName;
        $subproject->save();
        
        $file->move(('images/subprojects/' . $subproject->id), $fileName);

        if(isset($request->developers)){
            foreach($request->developers as $developer_id){
                $SubProject_User = new SubProjects_Users;
                $SubProject_User->sub_project_id = $subproject->id;
                $SubProject_User->user_id = $developer_id;
                $SubProject_User->save();
            }
        }
        return redirect('/admin/subprojects')->with('succes', 'Subproject succesvol aangemaakt.');
    }

    function update(UpdateSubProjectRequest $request, Subproject $subproject)
    {
        $oldPicture = $subproject->picture;
        
        $subproject->name = $request->name;
        $subproject->intro = $request->intro;
        $subproject->description = $request->description;
        $subproject->project_id = $request->project;

        if ($request->hasFile('picture')) 
        {
            $fileName = time() . '.' . $request->picture->extension();
            $file = $request->file('picture');
            $path = public_path() . '/images/projects/' . $subproject->id . '/'. $subproject->picture .' ';
            $subproject->picture = $fileName;
        }
        if(isset($file)){
            if(NULL !== $subproject->picture){
                unlink('images/subprojects/' . $subproject->id .'/'. $oldPicture.'');
            }

            $file->move(('/home/lara/public_html/images/subprojects/' . $subproject->id), $fileName);
        }
        $subproject->update();
        SubProjects_Users::where('sub_project_id', $subproject->id)->delete();
        if(isset($request->developers)){
            foreach($request->developers as $developer_id){
                $SubProject_User = new SubProjects_Users;
                $SubProject_User->sub_project_id = $subproject->id;
                $SubProject_User->user_id = $developer_id;
                $SubProject_User->save();
            }
        }
        return redirect('/admin/subprojects')->with('succes', 'Subproject succesvol bewerkt.');
    }

    function destroy(Request $request, Subproject $subproject)
    {
        $this->authorize('delete', $subproject);
        SubProjects_Users::where('sub_project_id', $subproject->id)->delete();
        $subproject->delete();
        return back()->with('succes', 'Subproject succesvol verwijderd.');
    }

    public function searchIndex(Subproject $subproject, Request $request)
    {
        $this->authorize('view', $subproject);
        $subprojects = Subproject::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.subprojects.index', ['subprojects' => $subprojects, 'search_term' => $request->search_term]);
    }

    public function indexFilter(Subproject $subproject, Request $request)
    {
        $this->authorize('view', $subproject);
        if($request->project_filter == 0){
            return redirect('admin/subprojects');
        }
        $subprojects = Subproject::where('project_id', $request->project_filter)->paginate(12);

        return view('admin.subprojects.index', ['subprojects' => $subprojects, 'project_filter' => $request->project_filter, 'projects' => Project::with('subprojects')->get()]);
    }
}
