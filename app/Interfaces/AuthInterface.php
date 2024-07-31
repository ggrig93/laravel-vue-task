<?php

namespace App\Interfaces;

use App\Http\Requests\Auth\CreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

interface AuthInterface
{
    /**
     * Create a new API token for a user.
     *
     * @param CreateRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function createToken(CreateRequest $request): JsonResponse;
}
