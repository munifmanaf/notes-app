<?php

// app/Policies/NotePolicy.php
namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Note $note)
    {
        return $user->id === $note->user_id;
    }

    public function update(User $user, Note $note)
    {
        return $user->id === $note->user_id;
    }

    public function delete(User $user, Note $note)
    {
        return $user->id === $note->user_id;
    }
}