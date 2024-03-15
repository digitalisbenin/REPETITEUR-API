<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tarification\StoreTarificationRequest;
use App\Http\Requests\Tarification\UpdateTarificationRequest;
use App\Http\Resources\Tarification\TarificationCollection;
use App\Http\Resources\Tarification\TarificationResource;
use App\Models\Tarification;
use Illuminate\Http\Request;

class TarificationController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tarification::query();

        if ($request->has('matiere_id')) {
            $query->where('matiere_id', $request->input('matiere_id'));
        }

        if ($request->has('classe_id')) {
            $query->where('classe_id', $request->input('classe_id'));
        }

        $tarification = $query->latest('created_at')->get();

        return new TarificationCollection($tarification);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTarificationRequest  $request)
    {
        $tarification = Tarification::create($request->all());

        return new TarificationResource($tarification);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $tarification = Tarification::find($id);
        return new TarificationResource($tarification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTarificationRequest $request, $id)
    {
        $tarification = Tarification::find($id);
        $tarification->update($request->all());

        return new TarificationResource($tarification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $tarification = Tarification::find($id);
        $tarification->delete();

        return response(null, 204);
    }
}
