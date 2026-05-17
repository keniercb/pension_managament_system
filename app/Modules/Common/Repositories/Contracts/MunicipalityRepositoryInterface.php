<?php

namespace App\Modules\Common\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Models\Municipality;

interface MunicipalityRepositoryInterface
{
    /**
    * Fetch Municipality objects by given params
    **/
    public function getMunicipalityByParams(array $params) : LengthAwarePaginator | Collection;
    /**
    * Creates a new Municipality
    **/
    public function createMunicipality(array $objectMunicipality) : Municipality;
    /**
    * Updates a Municipality object, returns true if action is executed successfully
    **/
    public function updateMunicipality(int $id, $objectMunicipality) : bool;
    /**
    * Deletes a Municipality object, returns true if action is executed successfully
    **/
    public function deleteMunicipality(int $id) : bool;
    /**
    * Retrieve a Municipality object by given Identifier
    **/
    public function findMunicipalityById(int $id) : Municipality;
}
