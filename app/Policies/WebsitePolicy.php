<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Website;
use Illuminate\Auth\Access\Response;
use Auth;

class WebsitePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Website $website): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if(Auth::User()->isStudent){
            return true;
        }
        else{
            return Auth::User()->isAdmin;
        }
    }

    public function adminCreate(User $user): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Website $website): bool
    {
        if(Auth::User()->isStudent){
            return $website->user_id = Auth::User()->id;
        }
        else{
            return Auth::User()->isAdmin;
        }
    }

    public function adminUpdate(User $user, Website $website): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Website $website): bool
    {
        if(Auth::User()->isStudent){
            return $website->user_id = Auth::User()->id;
        }
        else{
            return Auth::User()->isAdmin;
        }    
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Website $website): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Website $website): bool
    {
        //
    }
}
