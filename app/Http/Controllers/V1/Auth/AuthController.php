<?php

namespace App\Http\Controllers\V1\Auth;

use App\Actions\V1\Auth\LoginAction;
use App\Http\Requests\V1\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Nette\NotImplementedException;

class AuthController
{
    public function __construct(
        private LoginAction $loginAction
    )
    {

    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = $this->loginAction->execute($credentials['email'], $credentials['password']);
        return response()->json(['token' => $token]);
    }

    public function register()
    {
        throw new NotImplementedException();

    }

    public function logout()
    {
        throw new NotImplementedException();

    }

    public function me()
    {
        throw new NotImplementedException();

    }
}
