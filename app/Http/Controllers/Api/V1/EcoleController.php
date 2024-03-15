<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ecole\StoreEcoleRequest;
use App\Http\Requests\Ecole\UpdateEcoleRequest;
use App\Http\Resources\Ecole\EcoleCollection;
use App\Http\Resources\Ecole\EcoleResource;
use App\Models\Ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{
    //
          /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecole = Ecole::latest('created_at')->get();
        return new EcoleCollection($ecole);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEcoleRequest $request)
    {
        $ecole = Ecole::create($request->all());

        return new EcoleResource($ecole);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {   $ecole = Ecole::find($id);
        return new EcoleResource($ecole);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEcoleRequest $request, $id)
    {   $ecole = Ecole::find($id);
        $ecole->update($request->all());

        return new EcoleResource($ecole);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $ecole = Ecole::find($id);
        $ecole->delete();

        return response(null, 204);
    }
}
