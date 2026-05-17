<?php

namespace App\Modules\Common\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Models\Ministry;

interface MinistryRepositoryInterface
{
    /**
    * Fetch Ministry objects by given params
    **/
    public function getMinistryByParams(array $params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new Ministry
    **/
    public function createMinistry(array $objectMinistry) : Ministry;
    /**
    * Updates a Ministry object, returns true if action is executed successfully
    **/
    public function updateMinistry(int $id, $objectMinistry) : bool;
    /**
    * Deletes a Ministry object, returns true if action is executed successfully
    **/
    public function deleteMinistry(int $id) : bool;
    /**
    * Retrieve a Ministry object by given Identifier
    **/
    public function findMinistryById(int $id) : Ministry;
}
