<?php

namespace App\Policies;

use App\Models\Build;
use App\Models\User;

class BuildPolicy
{
    /**
     * Determine whether the user can update the build.
     */
    public function update(User $user, Build $build): bool
    {
        return $user->id === $build->user_id;
    }

    /**
     * Determine whether the user can delete the build.
     */
    public function delete(User $user, Build $build): bool
    {
        return $user->id === $build->user_id;
    }

    /**
     * Determine whether the user can view the build.
     */
    public function view(User $user, Build $build): bool
    {
        return true; // all users can view builds
    }
}
