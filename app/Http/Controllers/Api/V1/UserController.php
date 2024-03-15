<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
                  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $roles)
    {   
        return new UserResource($roles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $roles)
    {
        $roles->update($request->all());

        return new UserResource($roles);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $roles)
    {
        $roles->delete();

        return response(null, 204);
    }

    // public function updateCurrentUserPassword(UpdateUserPasswordRequest $request)
    // {
    //     if (Hash::check($request->old_password, auth()->user()->password)) {
    //         auth()->user()->update(['password' => bcrypt($request->new_password)]);
    //         return response(trans('messages.successfully_operated'), 200);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => trans('messages.invalid_password'),
    //             'data' => [
    //                 trans('messages.incorrect_old_password')
    //             ]
    //         ], 401);
    //     }
    // }
}
