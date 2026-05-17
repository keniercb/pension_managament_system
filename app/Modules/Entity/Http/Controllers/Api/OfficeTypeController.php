<?php

namespace App\Modules\Entity\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Entity\Http\Resources\Api\OfficeTypeResource;
use App\Modules\Entity\Services\OfficeTypeService;

class OfficeTypeController extends Controller
{
    public function __construct(
        protected OfficeTypeService $officeTypeService
    )
    {

    }


    public function index()
    {
        return OfficeTypeResource::collection($this->officeTypeService->getOfficeTypeByParams(
            []
        ));
    }
}
