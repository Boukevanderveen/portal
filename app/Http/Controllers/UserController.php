<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    function index(){
        return view('admin.users.index', ['users' => User::All()]);
    }
    
    function create(){
        return view('admin.users.create');
    }

    function edit(User $user){
        return view('admin.users.edit', compact(['user']));
    }

    function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->isAdmin = $request->is_admin;
        $user->save();
        return redirect('/admin/users')->with('succes', 'Gebruiker succesvol aangemaakt.');
    }

    function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)) {
        $user->password = bcrypt($request->password);
        }
        $user->isAdmin = $request->is_admin;
        $user->update();
        return redirect('/admin/users')->with('succes', 'Gebruiker succesvol bewerkt.');
    }

    function destroy(Request $request, User $user)
    {
        $user->delete();
        return back()->with('succes', 'Gebruiker succesvol verwijderd.');
    }

    public function searchIndex(User $user, Request $request)
    {
        $this->authorize('view', $user);
        $users = User::where('name', 'like', '%' . $request->search_term.'%')->latest()->paginate(12);
        return view('admin.users.index', ['users' => $users, 'search_term' => $request->search_term]);
    }
}
