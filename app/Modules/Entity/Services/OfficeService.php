<?php

namespace App\Modules\Entity\Services;

use App\Modules\Entity\Data\StoreOfficeData;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Repositories\Contracts\OfficeRepositoryInterface;
use App\Modules\Entity\Services\Contracts\OfficeServiceInterface;
use App\Modules\Entity\Models\Office;

class OfficeService implements OfficeServiceInterface
{
    public function __construct(
        protected OfficeRepositoryInterface $officeRepository
    )
    {
    }

    /**
     * Fetch Office objects by given params
     **/
    public function getOfficeByParams($params): LengthAwarePaginator|Collection
    {
        return $this->officeRepository->getOfficeByParams($params);
    }

    /**
     * Creates a new Office
     **/
    public function createOffice(StoreOfficeData $objectOffice): Office
    {
        $officeData = $objectOffice->toArray();
        $officeData['created_at'] = Carbon::now();
        //$officeData['created_by'] = auth()->user()?->name;
        $officeData['created_by'] = 'test';
        return $this->officeRepository->createOffice($officeData);
    }

    /**
     * Updates a Office object, returns true if action is executed successfully
     **/
    public function updateOffice(int $id, $objectOffice): bool
    {
        return $this->officeRepository->updateOffice($id, $objectOffice);
    }

    /**
     * Deletes a Office object, returns true if action is executed successfully
     **/
    public function deleteOffice(int $id): bool
    {
        return $this->officeRepository->deleteOffice($id);
    }

    /**
     * Retrieve a Office object by given Identifier
     **/
    public function findOfficeById(int $id): Office
    {
        return $this->officeRepository->findOfficeById($id);
    }
}
