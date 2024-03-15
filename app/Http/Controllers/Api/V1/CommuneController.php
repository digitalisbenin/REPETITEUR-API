<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Commune\StoreCommuneRequest;
use App\Http\Requests\Commune\UpdateCommuneRequest;
use App\Http\Resources\Commune\CommuneCollection;
use App\Http\Resources\Commune\CommuneRessource;
use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CommuneCollection(Commune::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommuneRequest  $request)
    {
        $commune = Commune::create($request->all());

        return new CommuneRessource($commune);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $commune = Commune::find($id);
        return new CommuneRessource($commune);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommuneRequest $request, $id)
    {
        $commune = Commune::find($id);
        $commune->update($request->all());

        return new CommuneRessource($commune);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $commune = Commune::find($id);
        $commune->delete();

        return response(null, 204);
    }
}
