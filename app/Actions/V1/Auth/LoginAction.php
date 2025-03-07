<?php

namespace App\Actions\V1\Auth;

use App\Exceptions\InvalidLoginException;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function execute(string $email,string $password):string
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            return $user->createToken('token-name', ['*'], now()->addDay())->plainTextToken;
        }

        throw new InvalidLoginException("Usuário ou senha inválidos",401);
    }
}
