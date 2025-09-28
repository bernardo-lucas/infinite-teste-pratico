<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\User;

class ClientePolicy
{
    /**
     * Determine whether the user can view any Cliente models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the specified Cliente.
     */
    public function view(User $user, Cliente $cliente): bool
    {
        return $user->id === $cliente->user_id;
    }

    /**
     * Determine whether the user can create Cliente models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the specified Cliente.
     */
    public function update(User $user, Cliente $cliente): bool
    {
        return $user->id === $cliente->user_id;
    }

    /**
     * Determine whether the user can delete the specified Cliente.
     */
    public function delete(User $user, Cliente $cliente): bool
    {
        return $user->id === $cliente->user_id;
    }

    /**
     * Determine whether the user can restore the specified Cliente.
     */
    public function restore(User $user, Cliente $cliente): bool
    {
        return $user->id === $cliente->user_id;
    }

    /**
     * Determine whether the user can permanently delete the specified Cliente.
     */
    public function forceDelete(User $user, Cliente $cliente): bool
    {
        return $user->id === $cliente->user_id;
    }
}
