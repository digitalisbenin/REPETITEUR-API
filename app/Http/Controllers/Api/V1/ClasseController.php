<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classe\StoreClasseRequest;
use App\Http\Requests\Classe\UpdateClasseRequest;
use App\Http\Resources\Classe\ClasseCollection;
use App\Http\Resources\Classe\ClasseResource;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ClasseCollection(Classe::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClasseRequest  $request)
    {
        $classe = Classe::create($request->all());

        return new ClasseResource($classe);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $classe = Classe::find($id);
        return new ClasseResource($classe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, $id)
    {
        $classe = Classe::find($id);
        $classe->update($request->all());

        return new ClasseResource($classe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $classe = Classe::find($id);
        $classe->delete();

        return response(null, 204);
    }
}
