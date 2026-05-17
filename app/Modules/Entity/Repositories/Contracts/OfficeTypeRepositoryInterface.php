<?php

namespace App\Modules\Entity\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Models\OfficeType;

interface OfficeTypeRepositoryInterface
{
    /**
    * Fetch OfficeType objects by given params
    **/
    public function getOfficeTypeByParams(array $params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new OfficeType
    **/
    public function createOfficeType(array $objectOfficeType) : OfficeType;
    /**
    * Updates a OfficeType object, returns true if action is executed successfully
    **/
    public function updateOfficeType(int $id, $objectOfficeType) : bool;
    /**
    * Deletes a OfficeType object, returns true if action is executed successfully
    **/
    public function deleteOfficeType(int $id) : bool;
    /**
    * Retrieve a OfficeType object by given Identifier
    **/
    public function findOfficeTypeById(int $id) : OfficeType;
}
