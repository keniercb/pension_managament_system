<?php

namespace App\Modules\Common\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Common\Http\Resources\Api\ProvinceResource;
use App\Modules\Common\Services\Contracts\ProvinceServiceInterface;

class ProvinceController extends Controller
{

    public function __construct(
        protected ProvinceServiceInterface $provinceService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function filter(Request $request)
    {
        return ProvinceResource::collection($this->provinceService->getProvinceByParams([
            'perPage' => $request->perPage ?? 10,
            'page' => $request->page ?? 1
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
