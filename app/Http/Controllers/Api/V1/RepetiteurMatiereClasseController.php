<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepetiteurMatiereClasse\StoreRepetiteurMatiereClasseRequest;
use App\Http\Requests\RepetiteurMatiereClasse\UpdateRepetiteurMatiereClasseRequest;
use App\Http\Resources\RepetiteurMatiereClasse\RepetiteurMatiereClasseCollection;
use App\Http\Resources\RepetiteurMatiereClasse\RepetiteurMatiereClasseResource;
use App\Http\Resources\RepetiteurMatiereClasse\RepetiteurTarificationCollection;
use App\Http\Resources\Tarification\TarificationCollection;
use App\Models\RepetiteurMatiereClasse;
use App\Models\Tarification;


use Illuminate\Http\Request;

class RepetiteurMatiereClasseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RepetiteurMatiereClasse::query();

        if ($request->has('matiere_id')) {
            $query->where('matiere_id', $request->input('matiere_id'));
        }

        if ($request->has('classe_id')) {
            $query->where('classe_id', $request->input('classe_id'));
        }
        if ($request->has('repetiteur_id')) {
            $query->where('repetiteur_id', $request->input('repetiteur_id'));
        }

         // Ajout de la condition pour vérifier le traitementDossiers
    // $query->whereHas('repetiteur', function ($query) {
    //     $query->where('traitementDossiers', 'Validé');
    // });
        $repetiteurmcs = $query->latest('created_at')->get();

        return new RepetiteurMatiereClasseCollection($repetiteurmcs);
    //     $repetiteurQuery = RepetiteurMatiereClasse::query();

    // if ($request->has('matiere_id')) {
    //     $repetiteurQuery->where('matiere_id', $request->input('matiere_id'));
    // }

    // if ($request->has('classe_id')) {
    //     $repetiteurQuery->where('classe_id', $request->input('classe_id'));
    // }

    // $repetiteurMcs = $repetiteurQuery->latest('created_at')->get();

    // $tarificationQuery = Tarification::query();

    // if ($request->has('matiere_id')) {
    //     $tarificationQuery->where('matiere_id', $request->input('matiere_id'));
    // }

    // if ($request->has('classe_id')) {
    //     $tarificationQuery->where('classe_id', $request->input('classe_id'));
    // }

    // $tarification = $tarificationQuery->latest('created_at')->get();


    // $result = $repetiteurMcs->merge($tarification);

    // return new RepetiteurMatiereClasseCollection($result);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepetiteurMatiereClasseRequest  $request)
    {
        $repetiteurmcs = RepetiteurMatiereClasse::create($request->all());

        return new RepetiteurMatiereClasseResource($repetiteurmcs);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $repetiteurmcs = RepetiteurMatiereClasse::find($id);
        return new RepetiteurMatiereClasseResource($repetiteurmcs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepetiteurMatiereClasseRequest $request, $id)
    {
        $repetiteurmcs = RepetiteurMatiereClasse::find($id);
        $repetiteurmcs->update($request->all());
        return new RepetiteurMatiereClasseResource($repetiteurmcs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $repetiteurmcs = RepetiteurMatiereClasse::find($id);
        $repetiteurmcs->delete();

        return response(null, 204);
    }
}
