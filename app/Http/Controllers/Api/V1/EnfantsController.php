<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Enfants\StoreEnfantsRequest;
use App\Http\Requests\Enfants\UpdateEnfantsRequest;
use App\Http\Resources\Enfants\EnfantsCollection;
use App\Http\Resources\Enfants\EnfantsResource;
use App\Models\Enfants;
use Illuminate\Http\Request;

class EnfantsController extends ApiController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EnfantsCollection(Enfants::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnfantsRequest $request)
    {
        $enfants = Enfants::create($request->all());

        return new EnfantsResource($enfants);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $enfants = Enfants::find($id);
        return new EnfantsResource($enfants);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnfantsRequest $request,  $id)
    {
        $enfants=Enfants::findOrFail($id);
        $enfants->update($request->all());

        return new EnfantsResource($enfants);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $enfants=Enfants::findOrFail($id);
        $enfants->delete();

        return response(null, 204);
    }
}
