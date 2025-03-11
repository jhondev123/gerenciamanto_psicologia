<?php

namespace App\Http\Controllers\V1\Auth;

use App\Actions\V1\Auth\LoginAction;
use App\Actions\V1\Auth\RegisterAction;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Nette\NotImplementedException;

class AuthController
{
    public function __construct(
        private LoginAction $loginAction,
        private RegisterAction $registerAction,
    )
    {

    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $token = $this->loginAction->execute($credentials['email'], $credentials['password']);
            $user = Auth::user();
            $user->load(['person', 'role']);

            return response()->json(['token' => $token, 'token_type' => 'Bearer', 'user' => $user]);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = $this->registerAction->execute($request);
            return response()->json($user, 201);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }

    }

    public function logout()
    {
        throw new NotImplementedException();

    }

    public function me():JsonResponse
    {
        $user = Auth::user();
        $user->load(['person', 'role']);
        return response()->json($user);

    }
}
