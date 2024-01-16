<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    function index(User $user){
        $this->authorize('view', $user);
        return view('admin.users.index', ['users' => User::Paginate(10)]);
    }
    
    function create(User $user){
        $this->authorize('create', $user);
        return view('admin.users.create');
    }

    function edit(User $user){
        $this->authorize('create', $user);
        return view('admin.users.edit', compact(['user']));
    }

    function store(StoreUserRequest $request)
    {
        $user = new User;
        if($request->privileges == 1){
        exec("sudo useradd -p $(openssl passwd -1 $request->password) fp-$request->name 2>&1", $output, $return_var);
        exec("sudo mkhomedir_helper fp-$request->name");
        $user->isStudent = 1;
        }
        if($request->privileges == 2){
            exec("sudo useradd -p $(openssl passwd -1 $request->password) $request->name 2>&1", $output, $return_var);
            exec("sudo mkhomedir_helper $request->name");
            exec("sudo usermod -a -G sudo $request->name");
            $user->isAdmin = 1;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        return redirect('/admin/users')->with('succes', 'Gebruiker succesvol aangemaakt.');
    }

    function update(UpdateUserRequest $request, User $user)
    {
        if($request->privileges == 1 ){
            $name = "fp-$request->name";
            if($user->isStudent){
            exec("sudo killall -u fp-$user->name`; ");
            exec("sudo pkill -9 -u `id -u fp-$user->name`; ");
            exec("sudo usermod -l fp-$request->name fp-$user->name");
            }
            else{
                exec("sudo killall -u $user->name`; ");
                exec("sudo pkill -9 -u `id -u $user->name`; ");
                exec("sudo usermod -l $name $user->name");
            }
            $user->isStudent = 1;
            $user->isAdmin = 0;
            $user->name = $request->name;
            exec("sudo deluser $name sudo");
            if(isset($request->password)){
                $user->password = bcrypt($request->password);
                exec("sudo usermod --password $(echo $request->password | openssl passwd -1 -stdin) $name");
            }
        }
        else if($request->privileges == 2 ){
            if($user->isAdmin){
                exec("sudo pkill -9 -u `id -u $user->name`; ");
                exec("sudo usermod -l $request->name $user->name");
                }
                else{
                    exec("sudo killall -u fp-$user->name`; ");
                    exec("sudo pkill -9 -u `id -u fp-$user->name`; ");
                    exec("sudo usermod -l $request->name fp-$user->name");
                }
            $user->isStudent = 0;
            $user->isAdmin = 1;
            $user->name = $request->name;
            exec("sudo usermod -a -G sudo $user->name");
        }

        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
            exec("sudo usermod --password $(echo $request->password | openssl passwd -1 -stdin) $user->name");
        }
        $user->update();
        return redirect('/admin/users')->with('succes', 'Gebruiker succesvol bewerkt.');
    }

    function destroy(Request $request, User $user)
    { 
        $this->authorize('delete', $user);
        if($user->isAdmin){
            exec("sudo killall -u $user->name`; ");
            exec("sudo pkill -9 -u `id -u $user->name`; ");
            exec("sudo deluser $user->name -f; sudo rm -r /home/$user->name -f");
        }
        else{
            exec("sudo killall -u fp-$user->name`; ");
            exec("sudo pkill -9 -u `id -u fp-$user->name`; ");
            exec("sudo deluser fp-$user->name -f; sudo rm -r /home/fp-$user->name -f");
        }
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
