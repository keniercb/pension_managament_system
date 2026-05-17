<?php

namespace App\Modules\Common\Services;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Repositories\Contracts\MunicipalityRepositoryInterface;
use App\Modules\Common\Services\Contracts\MunicipalityServiceInterface;
use App\Modules\Common\Models\Municipality;

class MunicipalityService implements MunicipalityServiceInterface
{
    public function __construct(
        protected MunicipalityRepositoryInterface $municipalityRepository
    )
    {
    }
    /**
    * Fetch Municipality objects by given params
    **/
    public function getMunicipalityByParams($params) : LengthAwarePaginator | Collection
    {
        return $this->municipalityRepository->getMunicipalityByParams($params);
    }
    /**
    * Creates a new Municipality
    **/
    public function createMunicipality($objectMunicipality) : Municipality
    {
        return $this->municipalityRepository->createMunicipality($objectMunicipality);
    }
    /**
    * Updates a Municipality object, returns true if action is executed successfully
    **/
    public function updateMunicipality(int $id, $objectMunicipality) : bool
    {
        return $this->municipalityRepository->updateMunicipality($id, $objectMunicipality);
    }
    /**
    * Deletes a Municipality object, returns true if action is executed successfully
    **/
    public function deleteMunicipality(int $id) : bool
    {
        return $this->municipalityRepository->deleteMunicipality($id);
    }
    /**
    * Retrieve a Municipality object by given Identifier
    **/
    public function findMunicipalityById(int $id) : Municipality
    {
         return $this->municipalityRepository->findMunicipalityById($id);
    }
}
