<?php

namespace App\Modules\Common\Services;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Common\Repositories\Contracts\MinistryRepositoryInterface;
use App\Modules\Common\Services\Contracts\MinistryServiceInterface;
use App\Modules\Common\Models\Ministry;

class MinistryService implements MinistryServiceInterface
{
    public function __construct(
        protected MinistryRepositoryInterface $ministryRepository
    )
    {
    }
    /**
    * Fetch Ministry objects by given params
    **/
    public function getMinistryByParams($params) : LengthAwarePaginator | Collection
    {
        return $this->ministryRepository->getMinistryByParams($params);
    }
    /**
    * Creates a new Ministry
    **/
    public function createMinistry($objectMinistry) : Ministry
    {
        $objectMinistry['created_at'] = Carbon::now();
        $objectMinistry['created_by'] = 'test_user';
        return $this->ministryRepository->createMinistry($objectMinistry);
    }
    /**
    * Updates a Ministry object, returns true if action is executed successfully
    **/
    public function updateMinistry(int $id, $objectMinistry) : bool
    {
        return $this->ministryRepository->updateMinistry($id, $objectMinistry);
    }
    /**
    * Deletes a Ministry object, returns true if action is executed successfully
    **/
    public function deleteMinistry(int $id) : bool
    {
        return $this->ministryRepository->deleteMinistry($id);
    }
    /**
    * Retrieve a Ministry object by given Identifier
    **/
    public function findMinistryById(int $id) : Ministry
    {
         return $this->ministryRepository->findMinistryById($id);
    }
}
