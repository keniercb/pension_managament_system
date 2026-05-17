<?php

namespace App\Modules\Common\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Models\Province;
use App\Modules\Common\Repositories\Contracts\ProvinceRepositoryInterface;

class ProvinceRepository implements ProvinceRepositoryInterface
{
    /**
     * Fetch Province objects by given params
     **/
    public function getProvinceByParams(array $params): LengthAwarePaginator|Collection
    {
        $query = Province::query();
        return $query->paginate($params['perPage'], '*', 'page', $params['page']);
    }

    /**
     * Creates a new Province
     **/
    public function createProvince(array $objectProvince): Province
    {
        return Province::create($objectProvince);
    }

    /**
     * Updates a Province object, returns true if action is executed successfully
     **/
    public function updateProvince(int $id, $objectProvince): bool
    {
        Province::findOrFail($id)->update($objectProvince);
        return true;
    }

    /**
     * Deletes a Province object, returns true if action is executed successfully
     **/
    public function deleteProvince(int $id): bool
    {
        Province::findOrFail($id)->delete();
        return true;
    }

    /**
     * Retrieve a Province object by given Identifier
     **/
    public function findProvinceById(int $id): Province
    {
        return Province::findOrFail($id);
    }
}
