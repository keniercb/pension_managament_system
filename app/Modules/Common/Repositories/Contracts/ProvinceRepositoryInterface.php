<?php

namespace App\Modules\Common\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Models\Province;

interface ProvinceRepositoryInterface
{
    /**
    * Fetch Province objects by given params
    **/
    public function getProvinceByParams(array $params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new Province
    **/
    public function createProvince(array $objectProvince) : Province;
    /**
    * Updates a Province object, returns true if action is executed successfully
    **/
    public function updateProvince(int $id, $objectProvince) : bool;
    /**
    * Deletes a Province object, returns true if action is executed successfully
    **/
    public function deleteProvince(int $id) : bool;
    /**
    * Retrieve a Province object by given Identifier
    **/
    public function findProvinceById(int $id) : Province;
}
