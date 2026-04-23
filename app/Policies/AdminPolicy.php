<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    //tambahkan skrip berikut
    public function viewAny(User $user): bool {
        return $user->hasRole("Admin");
    }
}
