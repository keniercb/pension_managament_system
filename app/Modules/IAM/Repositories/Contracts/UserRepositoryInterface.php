<?php

namespace App\Modules\IAM\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\IAM\Models\User;

interface UserRepositoryInterface
{
    /**
    * Fetch User objects by given params
    **/
    public function getUserByParams(array $params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new User
    **/
    public function createUser(array $objectUser) : User;
    /**
    * Updates a User object, returns true if action is executed successfully
    **/
    public function updateUser(int $id, $objectUser) : bool;
    /**
    * Deletes a User object, returns true if action is executed successfully
    **/
    public function deleteUser(int $id) : bool;
    /**
    * Retrieve a User object by given Identifier
    **/
    public function findUserById(int $id) : User;

    public function findUserByEmail(string $email) : User;
}
