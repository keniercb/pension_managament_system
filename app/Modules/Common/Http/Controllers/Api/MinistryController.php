<?php

namespace App\Modules\Common\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Common\Http\Resources\Api\MinistryResource;
use App\Modules\Common\Services\Contracts\MinistryServiceInterface;

class MinistryController extends Controller
{

    public function __construct(
        protected MinistryServiceInterface $ministryService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function filter(Request $request)
    {
        return MinistryResource::collection($this->ministryService->getMinistryByParams([
            'perPage' => $request->perPage ?? 10,
            'page' => $request->page ?? 1,
            'filter' => $request->filter ?? '',
            'sort' => $request->sort ?? 'name',
            'sortDirection' => $request->sortDirection ?? 'asc',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new MinistryResource($this->ministryService->createMinistry([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'description' => $request->description,
        ]));
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
