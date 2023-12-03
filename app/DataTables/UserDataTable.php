<?php

namespace App\DataTables;

use App\Models\User;

/**
 * Class UserDataTable
 */
class UserDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var User $query */
        return User::where('user_type', User::USER)->select('users.*');
    }
}
