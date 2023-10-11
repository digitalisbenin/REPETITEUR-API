<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Epreuve\StoreEpreuveRequest;
use App\Http\Requests\Epreuve\UpdateEpreuveRequest;
use App\Http\Resources\Epreuve\EpreuveCollection;
use App\Http\Resources\Epreuve\EpreuveResource;
use App\Models\Epreuve;
use Illuminate\Http\Request;

class EpreuveController extends ApiController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EpreuveCollection(Epreuve::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEpreuveRequest $request)
    {
        $epreuves = Epreuve::create($request->all());

        return new EpreuveResource($epreuves);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $epreuves = Epreuve::find($id);
        return new EpreuveResource($epreuves);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEpreuveRequest $request,  $id)
    {
        $epreuves=Epreuve::findOrFail($id);
        $epreuves->update($request->all());

        return new EpreuveResource($epreuves);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $epreuves=Epreuve::findOrFail($id);
        $epreuves->delete();

        return response(null, 204);
    }
}
