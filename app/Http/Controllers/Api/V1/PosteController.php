<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Poste\StorePosteRequest;
use App\Http\Requests\Poste\UpdatePosteRequest;
use App\Http\Resources\Poste\PosteCollection;
use App\Http\Resources\Poste\PosteResource;
use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends ApiController
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PosteCollection(Poste::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePosteRequest $request)
    {
        $postes = Poste::create($request->all());

        return new PosteResource($postes);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {   $postes = Poste::find($id);
        return new PosteResource($postes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePosteRequest $request, $id)
    {   $postes = Poste::find($id);
        $postes->update($request->all());

        return new PosteResource($postes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $postes = Poste::find($id);
        $postes->delete();

        return response(null, 204);
    }
}
