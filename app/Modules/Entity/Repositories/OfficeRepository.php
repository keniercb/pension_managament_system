<?php

namespace App\Modules\Entity\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Models\Office;
use App\Modules\Entity\Repositories\Contracts\OfficeRepositoryInterface;

class OfficeRepository implements OfficeRepositoryInterface
{
    /**
     * Fetch Office objects by given params
     **/
    public function getOfficeByParams(array $params): LengthAwarePaginator|Collection
    {
        $query = Office::query()->with(['province', 'municipality', 'type']);
        if (isset($params['provinceId'])) {
            $query->province($params['provinceId']);
        }
        if (isset($params['municipalityId'])) {
            $query->municipality($params['municipalityId']);
        }
        if (isset($params['officeTypeId'])) {
            $query->officeType($params['officeTypeId']);
        }
        if (isset($params['perPage'])) {
            return $query->paginate($params['perPage'], '*', 'page', $params['page']);
        }
        return $query->get();
    }

    /**
     * Creates a new Office
     **/
    public function createOffice(array $objectOffice): Office
    {
        return Office::create($objectOffice);
    }

    /**
     * Updates a Office object, returns true if action is executed successfully
     **/
    public function updateOffice(int $id, $objectOffice): bool
    {
        Office::findOrFail($id)->update($objectOffice);
        return true;
    }

    /**
     * Deletes a Office object, returns true if action is executed successfully
     **/
    public function deleteOffice(int $id): bool
    {
        Office::findOrFail($id)->delete();
        return true;
    }

    /**
     * Retrieve a Office object by given Identifier
     **/
    public function findOfficeById(int $id): Office
    {
        return Office::findOrFail($id);
    }
}
