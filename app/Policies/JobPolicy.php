<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can manage the model.
     *
     * @param \Illuminate\Foundation\Auth\User $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user instanceof \App\Models\Admin) {
            return $user->isAdministrator();
        }

        return false;
    }

    /**
     * Determine whether the user can create the model.
     *
     * @return bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can edit the model.
     *
     * @return bool
     */
    public function update()
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return bool
     */
    public function delete()
    {
        return true;
    }
}
