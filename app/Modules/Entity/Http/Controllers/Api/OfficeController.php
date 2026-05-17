<?php

namespace App\Modules\Entity\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Entity\Data\StoreOfficeData;
use App\Modules\Entity\Http\Requests\StoreOfficeRequest;
use Illuminate\Http\Request;

use App\Modules\Entity\Http\Resources\Api\OfficeResource;
use App\Modules\Entity\Services\Contracts\OfficeServiceInterface;

class OfficeController extends Controller
{

    public function __construct(
        protected OfficeServiceInterface $officeService
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return OfficeResource::collection(
            $this->officeService->getOfficeByParams([
                'perPage' => $request->input('perPage', 10),
                'page' => $request->input('page', 1),
                'provinceId' => $request->input('provinceId'),
                'municipalityId' => $request->input('municipalityId'),
                'officeTypeId' => $request->input('officeTypeId'),
            ])
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficeRequest $request)
    {
        return new OfficeResource($this->officeService->createOffice(StoreOfficeData::fromRequest($request)));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
