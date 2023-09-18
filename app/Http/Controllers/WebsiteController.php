<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\User;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class WebsiteController extends Controller
{   

    function adminIndex(Website $website){
        $this->authorize('view', $website);
        return view('admin.websites.index', ['websites' => Website::All()]);
    }   
    
    function adminCreate(Website $website){
        $this->authorize('create', $website);
        $students = User::where('isStudent', 1)->get();
        return view('admin.websites.create', compact(['students']));
    }

    function adminEdit(Website $website){
        $this->authorize('update', $website);
        return view('admin.websites.edit', compact(['website']));
    }

    function adminStore(StoreWebsiteRequest $request)
    {

        $website = new Website;
        $website->name = $request->name;
        $website->description = $request->description;
        $website->user_id = $request->student_id;
        if ($request->hasFile('file')) 
        {
            $fileName = $request->file->getClientOriginalName();
            Storage::disk('local')->put('websites/'.$request->student_id, $request->file('file'));

            $zip = new ZipArchive;
            if ($zip->open(storage_path('websites/'.$fileName.'')) === TRUE) {
                // Unzip Path
                $zip->extractTo(storage_path('websites/'.$request->student_id.'/'));
                $zip->close();
                unlink(storage_path('websites/'.$request->student_id.'/'.$fileName.''));
            }
        }

        $website->path = '/websites/'.$request->student_id.'/'.$fileName.'';
        $website->save();
        return redirect('/admin/websites')->with('succes', 'Website succesvol aangemaakt.');
    }

    function adminUpdate(UpdateWebsiteRequest $request, Website $website)
    {
        $website->name = $request->name;
        $website->description = $request->description;
        $website->user_id = $request->user_id;
        if ($request->hasFile('file')) 
        {
            $fileName = time() . '.' . $request->file->extension();
            $file = $request->file('file');
            $website->path = $fileName;
        }
        if(isset($file)){
            $file->move(public_path('/'.$request->user_id.''), $fileName);
        }
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
        $websites = Book::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.websites.index', ['websites' => $websites, 'search_term' => $request->search_term]);
    }
}
