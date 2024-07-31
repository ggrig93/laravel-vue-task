<?php

namespace App\Services;

use App\Interfaces\AuthInterface;
use App\Http\Requests\Auth\CreateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AuthService implements AuthInterface
{
    /**
     * @param CreateRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function createToken(CreateRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
