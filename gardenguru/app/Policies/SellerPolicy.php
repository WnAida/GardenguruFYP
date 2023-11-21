<?php

namespace App\Policies;

use App\Models\User;

class SellerPolicy
{
    public function create(User $user): bool
    {
        return false;
    }
}
