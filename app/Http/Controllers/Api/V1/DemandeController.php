<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Demande\StoreDemandeRequest;
use App\Http\Requests\Demande\UpdateDemandeRequest;
use App\Http\Resources\Demande\DemandeCollection;
use App\Http\Resources\Demande\DemandeResource;
use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Demande::query();
        // if ($request->has('user_id')) {
        //     $query->whereHas('enfants.parents', function($query) use ($request) {
        //         $query->where('user_id', $request->input('user_id'));
        //     });
        // }
        if ($request->has('user_id')) {
            $userId = $request->input('user_id');
            $query->where(function ($query) use ($userId) {
                $query->whereHas('enfants.parents', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
                $query->orWhereHas('repetiteur', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
            });
        }

        $demandes = $query->latest('created_at')->get();
        return new DemandeCollection ($demandes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDemandeRequest $request)
    {
        $demande = Demande::create($request->all());

        return new DemandeResource($demande);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $demande = Demande::find($id);
        return new Demande($demande);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemandeRequest $request,  $id)
    {
        $demande=Demande::findOrFail($id);
        $demande->update($request->all());

        return new DemandeResource($demande);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $demande=Demande::findOrFail($id);
        $demande->delete();

        return response(null, 204);
    }
}
