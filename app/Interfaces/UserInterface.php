<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserInterface
{
    /**
     * Get a paginated list of users.
     *
     * @return LengthAwarePaginator
     */
    public function getUsers(): LengthAwarePaginator;
}
