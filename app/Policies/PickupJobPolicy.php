<?php

namespace App\Policies;

use App\Http\Enum\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User;

class PickupJobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the use can do anything with the model.
     *
     * @param \Illuminate\Foundation\Auth\User $user
     * @return bool
     */
    public function before(User $user)
    {
        return $user->role == Role::Administrator->value;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return bool
     */
    public function viewAny()
    {
        return true;
    }

    /**
     * Determine whether the user can create the moodel.
     *
     * @return bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can edit the moodel.
     *
     * @return bool
     */
    public function update()
    {
        return true;
    }

    /**
     * Determine whether the user can delete the moodel.
     *
     * @return bool
     */
    public function delete()
    {
        return true;
    }
}
