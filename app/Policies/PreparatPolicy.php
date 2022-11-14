<?php

namespace App\Policies;

use App\Models\Preparat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PreparatPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Preparat $preparat)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role->role == 'Admin';
    }


    public function update(User $user, Preparat $preparat)
    {
        return ($user->id == $preparat->user_id) || ($user->role->role != 'User');
    }


    public function delete(User $user, Preparat $preparat)
    {
        return ($user->id == $preparat->user_id) || ($user->role->role != 'User');
    }

    public function restore(User $user, Preparat $preparat)
    {
        //
    }

    public function forceDelete(User $user, Preparat $preparat)
    {
        //
    }
}
