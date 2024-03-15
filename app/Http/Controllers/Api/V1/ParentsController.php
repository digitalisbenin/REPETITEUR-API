<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Parents\StoreParentsRequest;
use App\Http\Requests\Parents\UpdateParentsRequest;
use App\Http\Resources\Parents\ParentsCollection;
use App\Http\Resources\Parents\ParentsResource;
use App\Models\Parents;

use Illuminate\Http\Request;

class ParentsController extends ApiController
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //return new ParentsCollection(Parents::all());
        // $parents= QueryBuilder::for(Parents::publish())
        // ->allowedFilters(
        //     AllowedFilter::exact('user_id'),
        // );
        // return new ParentsCollection($parents->latest()->get());
        $query = Parents::query();

        if ($request->has('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        $parents = $query->latest()->get();

        return new ParentsCollection($parents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParentsRequest $request)
    {
        $parents = Parents::create($request->all());

        return new ParentsResource($parents);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $parents = Parents::find($id);
        return new ParentsResource($parents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParentsRequest $request, $id)
    {   $parents = Parents::find($id);
        $parents->update($request->all());

        return new ParentsResource($parents);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {   $parents = Parents::find($id);
        $parents->delete();

        return response(null, 204);
    }
}
