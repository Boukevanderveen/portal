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
use DB;

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
        /*
        $website->name = $request->name;
        $website->description = $request->description;
        if ($request->hasFile('file')) 
        {
            File::deleteDirectory(Storage::disk('websites')->path(''.$website->user_id.'/'.$website->folder_name.''));

            $fileName = $request->file->getClientOriginalName();
            Storage::disk('websites')->putFileAs(''.$website->user_id, $request->file('file'), $fileName);
            $zip = new ZipArchive;
            if ($zip->open(Storage::disk('websites')->path(''.$website->user_id.'/'.$fileName.'')) === TRUE) {
                // Unzip Path
                $zip->extractTo(Storage::disk('websites')->path(''.$website->user_id.'/'));
                $zip->close();
                unlink(Storage::disk('websites')->path(''.$website->user_id.'/'.$fileName.''));
            }
            $website->folder_name = basename($request->file('file')->getClientOriginalName(), '.'.$request->file('file')->getClientOriginalExtension());

        }
        */
        $website->name = $request->name;
        $website->link = $request->link;
        $website->isPublic = $request->isPublic;
        $website->update();
        return redirect('/websites/personal')->with('succes', 'Website succesvol bewerkt.');
    }

    function store(StoreWebsiteRequest $request, Website $website)
    {
        $this->authorize('create', $website);
        /*
        $website = new Website;
        $website->name = $request->name;
        $website->description = $request->description;
        $website->user_id = Auth::User()->id;
        if ($request->hasFile('file')) 
        {
            $fileName = $request->file->getClientOriginalName();
            Storage::disk('websites')->putFileAs(''.$request->student_id, $request->file('file'), $fileName);
            $zip = new ZipArchive;
            if ($zip->open(Storage::disk('websites')->path(''.$request->student_id.'/'.$fileName.'')) === TRUE) {
                // Unzip Path
                $zip->extractTo(Storage::disk('websites')->path(''.$request->student_id.'/'));
                $zip->close();
                unlink(Storage::disk('websites')->path(''.$request->student_id.'/'.$fileName.''));
            }
        }

        $website->folder_name = basename($request->file('file')->getClientOriginalName(), '.'.$request->file('file')->getClientOriginalExtension());
        $website->save();
        */
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
        
        //File::deleteDirectory(Storage::disk('websites')->path(''.$website->user_id.'/'.$website->folder_name.''));
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
        return view('admin.websites.create', compact(['students']));
    }

    function adminEdit(Website $website){
        $this->authorize('adminUpdate', $website);
        $students = User::where('isStudent', 1)->get();
        return view('admin.websites.edit', compact(['website', 'students']));
    }

    function adminStore(StoreWebsiteRequest $request)
    {
        /*
        if ($request->hasFile('db')) 
        {
        $dbFileName = $request->db->getClientOriginalName();
        $dbFilePath = Storage::disk('websites')->path('db_exports/'.$dbFileName.'');
        Storage::disk('websites')->putFileAs('db_exports', $request->file('db'), $dbFileName);

        DB::statement("CREATE DATABASE $request->db_name");
        //DB::statement("USE $request->db_name; SOURCE $dbFilePath");
        $sql = 'mysql -u root '.$request->db_name.' < '.$dbFilePath.'';
        $output = shell_exec($sql); 
        }

        $website = new Website;
        $website->name = $request->name;
        $website->description = $request->description;
        $website->user_id = $request->student_id;
        if ($request->hasFile('file')) 
        {
            $fileName = $request->file->getClientOriginalName();
            Storage::disk('websites')->putFileAs(''.$request->student_id, $request->file('file'), $fileName);
            $zip = new ZipArchive;
            if ($zip->open(Storage::disk('websites')->path(''.$request->student_id.'/'.$fileName.'')) === TRUE) {
                // Unzip Path
                $zip->extractTo(Storage::disk('websites')->path(''.$request->student_id.'/'));
                $zip->close();
                unlink(Storage::disk('websites')->path(''.$request->student_id.'/'.$fileName.''));
            }
        }

        $website->folder_name = basename($request->file('file')->getClientOriginalName(), '.'.$request->file('file')->getClientOriginalExtension());
        */
        $website = new Website;
        $website->name = $request->name;
        $website->link = $request->link;
        $website->isPublic = $request->isPublic;
        $website->user_id = Auth::User()->id;
        $website->save();
        return redirect('/admin/websites')->with('succes', 'Website succesvol aangemaakt.');
    }

    function adminUpdate(UpdateWebsiteRequest $request, Website $website)
    {
        /*
        $website->name = $request->name;
        $website->description = $request->description;
        $website->user_id = $request->student_id;
        if ($request->hasFile('file')) 
        {
            File::deleteDirectory(Storage::disk('websites')->path(''.$request->student_id.'/'.$website->folder_name.''));

            $fileName = $request->file->getClientOriginalName();
            Storage::disk('websites')->putFileAs(''.$request->student_id, $request->file('file'), $fileName);
            $zip = new ZipArchive;
            if ($zip->open(Storage::disk('websites')->path(''.$request->student_id.'/'.$fileName.'')) === TRUE) {
                // Unzip Path
                $zip->extractTo(Storage::disk('websites')->path(''.$request->student_id.'/'));
                $zip->close();
                unlink(Storage::disk('websites')->path(''.$request->student_id.'/'.$fileName.''));
            }
            $website->folder_name = basename($request->file('file')->getClientOriginalName(), '.'.$request->file('file')->getClientOriginalExtension());

        }
        */
        $website->name = $request->name;
        $website->link = $request->link;
        $website->isPublic = $request->isPublic;
        $website->update();
        return redirect('/admin/websites')->with('succes', 'Website succesvol bewerkt.');
    }

    function adminDestroy(Request $request, Website $website)
    {
        $this->authorize('delete', $website);
        //File::deleteDirectory(Storage::disk('websites')->path(''.$website->user_id.'/'.$website->folder_name.''));
        $website->delete();
        return back()->with('succes', 'Website succesvol verwijderd.');
    }

    public function searchIndex(Website $website, Request $request)
    {
        $this->authorize('view', $website);
        $websites = Book::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.websites.index', ['websites' => $websites, 'search_term' => $request->search_term]);
    }
}
