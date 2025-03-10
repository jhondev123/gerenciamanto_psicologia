<?php

namespace App\Actions\V1\Auth;

use App\Exceptions\InvalidLoginException;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    /**
     * @param string $email
     * @param string $password
     * @return string
     * @throws InvalidLoginException
     * Cria um token para o usuário logado e deleta todos os tokens anteriores
     */
    public function execute(string $email,string $password):string
    {
        if (!Auth::attempt(compact('email', 'password'))) {
            throw new InvalidLoginException("Unauthorized", 401);
        }

        $user = Auth::user();

        $user->tokens()->delete();

        return $user->createToken('token-name', ['*'], now()->addDay())->plainTextToken;
    }
}
