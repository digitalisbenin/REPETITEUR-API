<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends ApiController
{
               /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RoleCollection(Role::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $roles = Role::create($request->all());

        return new RoleResource($roles);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $roles = Role::find($id);
        return new RoleResource($roles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request,$id)
    {
        $roles = Role::find($id);
        $roles->update($request->all());

        return new RoleResource($roles);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {    $roles = Role::find($id);
        $roles->delete();

        return response(null, 204);
    }
}
