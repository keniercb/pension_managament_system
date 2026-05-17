<?php

namespace App\Modules\Entity\Services\Contracts;
use App\Modules\Entity\Data\StoreOfficeData;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Models\Office;

interface OfficeServiceInterface
{
    /**
    * Fetch Office objects by given params
    **/
    public function getOfficeByParams($params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new Office
    **/
    public function createOffice(StoreOfficeData $objectOffice) : Office;
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
