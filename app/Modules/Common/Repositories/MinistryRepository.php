<?php

namespace App\Modules\Common\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Models\Ministry;
use App\Modules\Common\Repositories\Contracts\MinistryRepositoryInterface;

class MinistryRepository implements MinistryRepositoryInterface
{
    /**
     * Fetch Ministry objects by given params
     **/
    public function getMinistryByParams(array $params): LengthAwarePaginator|Collection
    {
        $query = Ministry::query();
        if (isset($params['filter'])) {
            $query->filter($params['filter']);
        }

        if (!isset($params['sort'])) {
            $params['sort'] = 'id';
            $params['sortDirection'] = 'asc';
        }
        $query->orderBy($params['sort'], $params['sortDirection']);
        return $query->paginate($params['perPage'], '*', 'page', $params['page']);
    }

    /**
     * Creates a new Ministry
     **/
    public function createMinistry(array $objectMinistry): Ministry
    {
        return Ministry::create($objectMinistry);
    }

    /**
     * Updates a Ministry object, returns true if action is executed successfully
     **/
    public function updateMinistry(int $id, $objectMinistry): bool
    {
        Ministry::findOrFail($id)->update($objectMinistry);
        return true;
    }

    /**
     * Deletes a Ministry object, returns true if action is executed successfully
     **/
    public function deleteMinistry(int $id): bool
    {
        Ministry::findOrFail($id)->delete();
        return true;
    }

    /**
     * Retrieve a Ministry object by given Identifier
     **/
    public function findMinistryById(int $id): Ministry
    {
        return Ministry::findOrFail($id);
    }
}
