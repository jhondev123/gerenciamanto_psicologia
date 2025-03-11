<?php

namespace App\Actions\V1\Auth;

use App\Enums\RolesEnum;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Models\Person;
use App\Models\User;

class RegisterAction
{
    public function execute(RegisterRequest $request): User
    {
        $userData = $request->validated();
        $person = Person::create($userData);
        return User::create([
            'role_id' => RolesEnum::PSYCHOLOGIST->value,
            'people_id' => $person->id,
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
        ]);
    }
}
