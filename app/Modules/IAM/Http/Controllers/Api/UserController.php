<?php

namespace App\Modules\IAM\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\IAM\Data\InputUserData;
use App\Modules\IAM\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

use App\Modules\IAM\Http\Resources\Api\UserResource;
use App\Modules\IAM\Services\Contracts\UserServiceInterface;


class UserController extends Controller
{

    public function __construct(
        protected UserServiceInterface $userService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return UserResource::collection($this->userService->getUserByParams([
            'perPage' => $request->input('perPage', 20),
            'page' => $request->input('page', 1),
            'orderBy' => $request->input('orderBy', 'id'),
            'sortOrder' => $request->input('sortOrder', 'asc'),
            'filter' => $request->input('filter', null),
            'filters' => [
                'name' => $request->input('name', ''),
                'email' => $request->input('email', ''),
            ]
        ]));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $inputData = InputUserData::fromRequest($request);
        return new UserResource($this->userService->createUser($inputData));
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
