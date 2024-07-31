<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService implements UserInterface
{
    /**
     * Get a paginated list of users.
     *
     * @return LengthAwarePaginator
     */
    public function getUsers(): LengthAwarePaginator
    {
        return User::paginate(5);
    }
}
