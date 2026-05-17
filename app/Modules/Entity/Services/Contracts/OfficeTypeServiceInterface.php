<?php

namespace App\Modules\Entity\Services\Contracts;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Models\OfficeType;

interface OfficeTypeServiceInterface
{
    /**
    * Fetch OfficeTyoe objects by given params
    **/
    public function getOfficeTypeByParams($params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new OfficeTyoe
    **/
    public function createOfficeType($objectOfficeType) : OfficeType;
    /**
    * Updates a OfficeTyoe object, returns true if action is executed successfully
    **/
    public function updateOfficeType(int $id, $objectOfficeType) : bool;
    /**
    * Deletes a OfficeTyoe object, returns true if action is executed successfully
    **/
    public function deleteOfficeType(int $id) : bool;
    /**
    * Retrieve a OfficeTyoe object by given Identifier
    **/
    public function findOfficeTypeById(int $id) : OfficeType;
}
