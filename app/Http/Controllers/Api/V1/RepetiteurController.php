<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Repetiteur\StoreRepetiteurRequest;
use App\Http\Requests\Repetiteur\UpdateRepetiteurRequest;
use App\Http\Resources\Repetiteur\RepetiteurCollection;
use App\Http\Resources\Repetiteur\RepetiteurResource;
use App\Models\Repetiteur;
use Illuminate\Http\Request;

class RepetiteurController extends ApiController
{
           /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RepetiteurCollection(Repetiteur::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepetiteurRequest $request)
    {
        $repetiteurs = Repetiteur::create($request->all());

        return new RepetiteurResource($repetiteurs);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {         $repetiteurs = Repetiteur::find($id);
        return new RepetiteurResource($repetiteurs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepetiteurRequest $request, $id)
    {
        $repetiteurs = Repetiteur::find($id);
        $repetiteurs->update($request->all());

        return new RepetiteurResource($repetiteurs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {    $repetiteurs = Repetiteur::find($id);
        $repetiteurs->delete();

        return response(null, 204);
    }
}
