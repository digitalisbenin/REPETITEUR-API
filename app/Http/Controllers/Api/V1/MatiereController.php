<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Matiere\StoreMatiereRequest;
use App\Http\Requests\Matiere\UpdateMatiereRequest;
use App\Http\Resources\Matiere\MatiereCollection;
use App\Http\Resources\Matiere\MatiereResource;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends ApiController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MatiereCollection(Matiere::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatiereRequest $request)
    {
        $matiere = Matiere::create($request->all());

        return new MatiereResource($matiere);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $matiere = Matiere::find($id);
        return new MatiereResource($matiere);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatiereRequest $request, $id)
    {
        $matiere = Matiere::find($id);
        $matiere->update($request->all());

        return new MatiereResource($matiere);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $matiere = Matiere::find($id);
        $matiere->delete();

        return response(null, 204);
    }
}
