<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user): bool
    {
        return false;
    }
}
