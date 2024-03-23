<?php

namespace App\Policies;

use App\Models\Campanha;
use App\Models\User;

class CampanhaPolicy
{

    public function edit(User $user, Campanha $campanha)
    {
        return $user->id === $campanha->user_id;
    }

    public function isAdmin(User $user)
    {
        return $user->id === 1;
    }

}
