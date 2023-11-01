<?php

namespace App\Policies;

use App\Models\Projectweek;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Auth;

class ProjectweekPolicy
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
    public function view(User $user, Projectweek $projectweek): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Projectweek $projectweek): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Projectweek $projectweek): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Projectweek $projectweek): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Projectweek $projectweek): bool
    {
        //
    }
}
