<?php

namespace App\Modules\IAM\Services;

use App\Modules\IAM\Data\AuthUserData;
use App\Modules\IAM\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\IAM\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{

    public function __construct(protected UserRepositoryInterface $userRepository)
    {

    }

    public function authenticate($email, $password): AuthUserData
    {
        $user = $this->userRepository->findUserByEmail($email);
        if ($user && Hash::check($password, $user->password)) {
            $token = explode('|', $user->createToken('authToken')->plainTextToken);
            return new AuthUserData(
                $user->id,
                $user->name,
                $user->email,
                $token[1],
            );
        }
        throw new \Exception('Authentication failed');
    }

    public function logout(): void
    {
        auth()->user()->tokens()->delete();
    }
}
