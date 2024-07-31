<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class UserController extends Controller
{
    protected UserInterface $userService;

    public function __construct(UserInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Users/index');
    }

    /**
     * Get a paginated list of users.
     */
    public function getUsers(): LengthAwarePaginator
    {
        return $this->userService->getUsers();
    }
}
