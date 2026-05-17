<?php

namespace App\Modules\IAM\Services\Contracts;
use App\Modules\IAM\Data\InputUserData;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\IAM\Models\User;

interface UserServiceInterface
{
    /**
    * Fetch User objects by given params
    **/
    public function getUserByParams($params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new User
    **/
    public function createUser(InputUserData$objectUser) : User;
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
}
