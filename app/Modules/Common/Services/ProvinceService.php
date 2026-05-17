<?php

namespace App\Modules\Common\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Repositories\Contracts\ProvinceRepositoryInterface;
use App\Modules\Common\Services\Contracts\ProvinceServiceInterface;
use App\Modules\Common\Models\Province;

class ProvinceService implements ProvinceServiceInterface
{
    public function __construct(
        protected ProvinceRepositoryInterface $provinceRepository
    )
    {
    }

    /**
     * Fetch Province objects by given params
     **/
    public function getProvinceByParams($params): LengthAwarePaginator|Collection
    {
        if (isset($params['perPage'])) {
        }
        return $this->provinceRepository->getProvinceByParams($params);
    }

    /**
     * Creates a new Province
     **/
    public function createProvince($objectProvince): Province
    {
        return $this->provinceRepository->createProvince($objectProvince);
    }

    /**
     * Updates a Province object, returns true if action is executed successfully
     **/
    public function updateProvince(int $id, $objectProvince): bool
    {
        return $this->provinceRepository->updateProvince($id, $objectProvince);
    }

    /**
     * Deletes a Province object, returns true if action is executed successfully
     **/
    public function deleteProvince(int $id): bool
    {
        return $this->provinceRepository->deleteProvince($id);
    }

    /**
     * Retrieve a Province object by given Identifier
     **/
    public function findProvinceById(int $id): Province
    {
        return $this->provinceRepository->findProvinceById($id);
    }
}
