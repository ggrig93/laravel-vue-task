<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateRequest;
use App\Interfaces\AuthInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ApiTokenController extends Controller
{
    protected AuthInterface $authService;

    public function __construct(AuthInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function createToken(CreateRequest $request): JsonResponse
    {
        return $this->authService->createToken($request);
    }
}
