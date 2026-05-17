<?php

namespace App\Modules\Entity\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Modules\Entity\Repositories\Contracts\OfficeTypeRepositoryInterface;
use App\Modules\Entity\Services\Contracts\OfficeTypeServiceInterface;
use App\Modules\Entity\Models\OfficeType;

class OfficeTypeService implements OfficeTypeServiceInterface
{
    public function __construct(
        protected OfficeTypeRepositoryInterface $officeTypeRepository
    )
    {
    }

    /**
     * Fetch OfficeType objects by given params
     **/
    public function getOfficeTypeByParams($params): LengthAwarePaginator|Collection
    {
        return $this->officeTypeRepository->getOfficeTypeByParams($params);
    }

    /**
     * Creates a new OfficeType
     **/
    public function createOfficeType($objectOfficeType): OfficeType
    {
        return $this->officeTypeRepository->createOfficeType($objectOfficeType);
    }

    /**
     * Updates a OfficeType object, returns true if action is executed successfully
     **/
    public function updateOfficeType(int $id, $objectOfficeType): bool
    {
        return $this->officeTypeRepository->updateOfficeType($id, $objectOfficeType);
    }

    /**
     * Deletes a OfficeType object, returns true if action is executed successfully
     **/
    public function deleteOfficeType(int $id): bool
    {
        return $this->officeTypeRepository->deleteOfficeType($id);
    }

    /**
     * Retrieve a OfficeType object by given Identifier
     **/
    public function findOfficeTypeById(int $id): OfficeType
    {
        return $this->officeTypeRepository->findOfficeTypeById($id);
    }
}
