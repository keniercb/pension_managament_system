<?php

namespace App\Modules\IAM\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\IAM\Http\Requests\LoginUserRequest;
use App\Modules\IAM\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    )
    {

    }

    /**
     * @throws \Exception
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        return response()->json(
            $this->authService->authenticate($request->input('email'), $request->input('password'))
        );

    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json('Logged out');
    }
}
