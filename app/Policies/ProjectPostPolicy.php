<?php

namespace App\Policies;

use App\Models\ProjectPost;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Auth;

class ProjectPostPolicy
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
    public function view(User $user, ProjectPost $projectPost): bool
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
    public function update(User $user, ProjectPost $projectPost): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProjectPost $projectPost): bool
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProjectPost $projectPost): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProjectPost $projectPost): bool
    {
        //
    }
}
