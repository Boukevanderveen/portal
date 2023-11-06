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
        exec("sudo useradd -p $(openssl passwd -1 $request->password) $request->name");
        exec("sudo mkhomedir_helper $request->name");

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($request->privileges == 1){
            $user->isStudent = 1;
        }
        else if($request->privileges == 2){
            $user->isAdmin = 1;
        }
        $user->save();

        return redirect('/admin/users')->with('succes', 'Gebruiker succesvol aangemaakt.');
    }

    function update(UpdateUserRequest $request, User $user)
    {
        if($user->name !== $request->name){

            if($user->name !== $request->name){
                
                //exec("sudo pkill -u gebruiker-een; sudo usermod -l  gebruiker-een23 gebruiker-een");
                exec("sudo pkill -u $user->name; sudo usermod -l  $request->name $user->name");

            }
        }
        if($request->has('password')){
            exec("sudo usermod --password $(echo $request->password | openssl passwd -1 -stdin) $user->name");
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)) {
        $user->password = bcrypt($request->password);
        }
        if($request->privileges == 1){
            $user->isStudent = 1;
            $user->isAdmin = 0;
        }
        else if($request->privileges == 2){
            $user->isAdmin = 1;
            $user->isStudent = 0;
        }
        $user->update();
        return redirect('/admin/users')->with('succes', 'Gebruiker succesvol bewerkt.');
    }

    function destroy(Request $request, User $user)
    { 
        exec("sudo pkill -9 -u `id -u $user->name`; ");
        exec("sudo deluser $user->name -f; sudo rm -r /home/$user->name -f");
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
