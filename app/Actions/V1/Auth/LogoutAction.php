<?php

namespace App\Actions\V1\Auth;

use Illuminate\Http\Request;
use App\Exceptions\InvalidLogoutException;

class LogoutAction
{
    public function execute(Request $request)
    {
        if (!request()->user()->currentAcessToken) {
            throw new InvalidLogoutException('User does not have a valid token');
        }

        $request->user()->currentAcessToken()->delete();

        return [
            'Succesfully logged out'
        ];
    }
}