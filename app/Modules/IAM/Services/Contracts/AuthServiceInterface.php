<?php

namespace App\Modules\IAM\Services\Contracts;

use App\Modules\IAM\Data\AuthUserData;

interface AuthServiceInterface
{
    public function authenticate($email, $password) : AuthUserData;
}
