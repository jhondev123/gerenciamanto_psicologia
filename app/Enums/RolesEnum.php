<?php

namespace App\Enums;

enum RolesEnum:int
{
    case ADMIN = 1;
    case PSYCHOLOGIST = 2;
    case PATIENT = 3;
    case SECRETARY = 4;
    case GUEST = 5;

}
