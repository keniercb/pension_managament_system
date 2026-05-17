<?php

namespace App\Modules\IAM\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\IAM\Models\User;
use App\Modules\IAM\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Fetch User objects by given params
     **/
    public function getUserByParams(array $params): LengthAwarePaginator|Collection
    {
        $query = User::query();
        if (isset($params['filter'])) {
            $query->filter($params['filter']);
        } else {
            if (isset($params['filters']['name'])) {
                $query->name($params['filters']['name']);
            }
            if (isset($params['filters']['email'])) {
                $query->email($params['filters']['email']);
            }
        }
        if (isset($params['orderBy'])) {
            $query->orderBy($params['orderBy'], $params['sortOrder']);
        }
        if (isset($params['perPage'])) {
            return $query->paginate($params['perPage'], '*', 'page', $params['page']);
        }
        return $query->get();
    }

    /**
     * Creates a new User
     **/
    public function createUser(array $objectUser): User
    {
        // TODO Assign role
        return User::create($objectUser);
    }

    /**
     * Updates a User object, returns true if action is executed successfully
     **/
    public function updateUser(int $id, $objectUser): bool
    {
        User::query()->findOrFail($id)->update($objectUser);
        return true;
    }

    /**
     * Deletes a User object, returns true if action is executed successfully
     **/
    public function deleteUser(int $id): bool
    {
        User::query()->findOrFail($id)->delete();
        return true;
    }

    /**
     * Retrieve a User object by given Identifier
     **/
    public function findUserById(int $id): User
    {
        return User::query()->findOrFail($id);
    }

    public function findUserByEmail(string $email): User
    {
        return User::query()->where('email', '=', $email)->firstOrFail();
    }
}
