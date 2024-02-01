<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Website;
use App\Models\User;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use Illuminate\Support\Facades\Storage;
use File;
use ZipArchive;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Collection;

class WebsiteController extends Controller
{

    function indexPersonal(Website $website){
        return view('websites.personal', ['websites' => Website::where('user_id', Auth::User()->id)->get()]);
    } 

    function index(Website $website){
        return view('websites.index', ['websites' => Website::where('isPublic', 1)->get()]);
    } 

    function edit(Website $website){
        $this->authorize('update', $website);
        return view('websites.edit', compact(['website']));
    }

    function create(Website $website){
        $this->authorize('create', $website);
        return view('websites.create');
    }

    function update(UpdateWebsiteRequest $request, Website $website)
    {
        $this->authorize('update', $website);
        $website->name = $request->name;
        $website->link = $request->link;
        $website->isPublic = $request->isPublic;
        $website->update();
        return redirect('/websites/personal')->with('succes', 'Website succesvol bewerkt.');
    }

    function store(StoreWebsiteRequest $request, Website $website)
    {
        $this->authorize('create', $website);
        $website = new Website;
        $website->name = $request->name;
        $website->link = $request->link;
        $website->isPublic = $request->isPublic;
        $website->user_id = Auth::User()->id;
        $website->save();
        return redirect('/websites/personal')->with('succes', 'Website succesvol aangemaakt.');
    }

    function destroy(Request $request, Website $website)
    {
        $this->authorize('delete', $website);
        $website->delete();
        return redirect('websites/personal')->with('succes', 'Website succesvol verwijderd.');
    }
    
    function adminIndex(Website $website){
        $this->authorize('view', $website);
        return view('admin.websites.index', ['websites' => Website::Paginate(10)]);
    }   
    
    function adminCreate(Website $website){
        $this->authorize('adminCreate', $website);
        $students = User::where('isStudent', 1)->get();
        $users = User::All();
        return view('admin.websites.create', compact(['students', 'users']));
    }

    function adminEdit(Website $website){
        $this->authorize('adminUpdate', $website);
        $students = User::where('isStudent', 1)->get();
        $users = User::All();
        return view('admin.websites.edit', compact(['website', 'students', 'users']));
    }

    function adminStore(StoreWebsiteRequest $request)
    {
        $website = new Website;
        $website->name = $request->name;
        $website->link = $request->link;
        $website->isPublic = $request->isPublic;
        $website->user_id = $request->user;
        $website->save();
        return redirect('/admin/websites')->with('succes', 'Website succesvol aangemaakt.');
    }

    function adminUpdate(UpdateWebsiteRequest $request, Website $website)
    {
        $website->name = $request->name;
        $website->link = $request->link;
        $website->isPublic = $request->isPublic;
        $website->user_id = $request->user;
        $website->update();
        return redirect('/admin/websites')->with('succes', 'Website succesvol bewerkt.');
    }

    function adminDestroy(Request $request, Website $website)
    {
        $this->authorize('delete', $website);
        $website->delete();
        return back()->with('succes', 'Website succesvol verwijderd.');
    }

    public function searchIndex(Website $website, Request $request)
    {
        $this->authorize('view', $website);
        $websites = Website::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.websites.index', ['websites' => $websites, 'search_term' => $request->search_term]);
    }

    public function indexFilter(Website $website, Request $request)
    {
        if($request->school_year_filter == 0){
            return redirect('/websites');
        }
        $websites = new Collection();
        $users = User::where('school_year', $request->school_year_filter)->get();
        foreach($users as $user){
            foreach($user->websites as $website){
                $websites->push($website);
            }
        }
        return view('websites.index', ['websites' => $websites, 'school_year_filter' => $request->school_year_filter]);
    }

    public function adminIndexFilter(Website $website, Request $request)
    {
        $this->authorize('view', $website);
        if($request->school_year_filter == 0){
            return redirect('admin/websites');
        }
        $websites = new Collection();
        $users = User::where('school_year', $request->school_year_filter)->get();
        foreach($users as $user){
            foreach($user->websites as $website){
                $websites->push($website);
            }
        }
        return view('admin.websites.index', ['websites' => $websites, 'school_year_filter' => $request->school_year_filter]);
    }
    
}
