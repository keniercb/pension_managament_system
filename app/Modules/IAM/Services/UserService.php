<?php

namespace App\Modules\IAM\Services;

use App\Modules\IAM\Data\InputUserData;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\IAM\Repositories\Contracts\UserRepositoryInterface;
use App\Modules\IAM\Services\Contracts\UserServiceInterface;
use App\Modules\IAM\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    /**
     * Fetch User objects by given params
     **/
    public function getUserByParams($params): LengthAwarePaginator|Collection
    {
        return $this->userRepository->getUserByParams($params);
    }

    /**
     * Creates a new User
     **/
    public function createUser(InputUserData $objectUser): User
    {
        $userData = $objectUser->toArray();
        $userData['password'] = Hash::make($userData['password']);
        $userData['created_by'] = auth()->user()?->name;
        $userData['created_at'] = Carbon::now();
        return $this->userRepository->createUser($userData);
    }

    /**
     * Updates a User object, returns true if action is executed successfully
     **/
    public function updateUser(int $id, $objectUser): bool
    {
        return $this->userRepository->updateUser($id, $objectUser);
    }

    /**
     * Deletes a User object, returns true if action is executed successfully
     **/
    public function deleteUser(int $id): bool
    {
        return $this->userRepository->deleteUser($id);
    }

    /**
     * Retrieve a User object by given Identifier
     **/
    public function findUserById(int $id): User
    {
        return $this->userRepository->findUserById($id);
    }
}
