<?php

namespace App\Modules\Entity\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Models\OfficeType;
use App\Modules\Entity\Repositories\Contracts\OfficeTypeRepositoryInterface;

class OfficeTypeRepository implements OfficeTypeRepositoryInterface
{
    /**
     * Fetch OfficeType objects by given params
     **/
    public function getOfficeTypeByParams(array $params): LengthAwarePaginator|Collection
    {
        if (isset($params['perPage'])) {
            return OfficeType::query()->paginate($params['perPage'], '*', 'page', $params['page'] ?? 1);
        }
        return OfficeType::all();
    }

    /**
     * Creates a new OfficeType
     **/
    public function createOfficeType(array $objectOfficeType): OfficeType
    {
        return OfficeType::create($objectOfficeType);
    }

    /**
     * Updates a OfficeType object, returns true if action is executed successfully
     **/
    public function updateOfficeType(int $id, $objectOfficeType): bool
    {
        OfficeType::findOrFail($id)->update($objectOfficeType);
        return true;
    }

    /**
     * Deletes a OfficeType object, returns true if action is executed successfully
     **/
    public function deleteOfficeType(int $id): bool
    {
        OfficeType::findOrFail($id)->delete();
        return true;
    }

    /**
     * Retrieve a OfficeType object by given Identifier
     **/
    public function findOfficeTypeById(int $id): OfficeType
    {
        return OfficeType::findOrFail($id);
    }
}
