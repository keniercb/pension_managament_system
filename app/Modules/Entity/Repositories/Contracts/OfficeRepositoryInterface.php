<?php

namespace App\Modules\Entity\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Models\Office;

interface OfficeRepositoryInterface
{
    /**
    * Fetch Office objects by given params
    **/
    public function getOfficeByParams(array $params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new Office
    **/
    public function createOffice(array $objectOffice) : Office;
    /**
    * Updates a Office object, returns true if action is executed successfully
    **/
    public function updateOffice(int $id, $objectOffice) : bool;
    /**
    * Deletes a Office object, returns true if action is executed successfully
    **/
    public function deleteOffice(int $id) : bool;
    /**
    * Retrieve a Office object by given Identifier
    **/
    public function findOfficeById(int $id) : Office;
}
