<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Comment $comment)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role->role == 'User';
    }

    public function update(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id);
    }


    public function delete(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id) || ($user->role->role == 'Admin')|| ($user->role->role == 'Moderator');
    }


    public function restore(User $user, Comment $comment)
    {
        //
    }

    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
