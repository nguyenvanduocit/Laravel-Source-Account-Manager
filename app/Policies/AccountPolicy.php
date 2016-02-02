<?php

namespace App\Policies;

use App\Account;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User $user
     * @param Account $account
     *
     * @return bool
     *
     */
    public function update(User $user, Account $account)
    {
        return $user->id === $account->user_id;
    }
}
