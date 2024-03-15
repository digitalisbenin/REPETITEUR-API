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
    public function index(Request $request)
    {
        $query = Enfants::query();

        if ($request->has('user_id')) {
            $query->whereHas('parents', function($query) use ($request) {
                $query->where('user_id', $request->input('user_id'));
            });
        }

        if ($request->has('parents_id')) {
            $query->where('parents_id', $request->input('parents_id'));
        }

        $enfants = $query->latest('created_at')->get();

        return new EnfantsCollection($enfants);
        // $enfants = Enfants::latest('updated_at')->get();
        // return new EnfantsCollection($enfants);
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
