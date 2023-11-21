<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user): bool
    {
        return false;
    }
}
