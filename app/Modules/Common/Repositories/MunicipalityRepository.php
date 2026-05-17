<?php

namespace App\Modules\Common\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Models\Municipality;
use App\Modules\Common\Repositories\Contracts\MunicipalityRepositoryInterface;

class MunicipalityRepository implements MunicipalityRepositoryInterface
{
    /**
    * Fetch Municipality objects by given params
    **/
    public function getMunicipalityByParams(array $params) : LengthAwarePaginator | Collection
    {
    }
    /**
    * Creates a new Municipality
    **/
    public function createMunicipality(array $objectMunicipality) : Municipality
    {
        return Municipality::create($objectMunicipality);
    }
    /**
    * Updates a Municipality object, returns true if action is executed successfully
    **/
    public function updateMunicipality(int $id, $objectMunicipality) : bool
    {
        Municipality::findOrFail($id)->update($objectMunicipality);
        return true;
    }

    /**
    * Deletes a Municipality object, returns true if action is executed successfully
    **/
    public function deleteMunicipality(int $id) : bool
    {
        Municipality::findOrFail($id)->delete();
        return true;
    }
    /**
    * Retrieve a Municipality object by given Identifier
    **/
    public function findMunicipalityById(int $id) : Municipality
    {
        return Municipality::findOrFail($id);
    }
}
