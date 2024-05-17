<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\Appreciations\StoreAppreciationsRequest;
use App\Http\Requests\Appreciations\UpdateAppreciationsRequest;
use App\Http\Resources\Appreciations\AppreciationsCollection;
use App\Http\Resources\Appreciations\AppreciationsResource;
use App\Models\Appreciation;


class AppreciationsController extends Controller
{
    public function index(Request $request)
    {
        $query = Appreciation::query();
        if ($request->has('user_id')) {
            $query->whereHas('demande.enfants.parents', function($query) use ($request) {
                $query->where('user_id', $request->input('user_id'));
            });

            // $query->whereNotNull('appreciation_repetiteur');
        }

        $appreciations = $query->latest('created_at')->get();
        return new AppreciationsCollection($appreciations);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppreciationsRequest $request)
    {
        $appreciations = Appreciation::create($request->all());

        return new AppreciationsResource($appreciations);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {   $appreciations = Appreciation::find($id);
        return new AppreciationsResource($appreciations);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppreciationsRequest $request, $id)
    {   $appreciations = Appreciation::find($id);
        $appreciations->update($request->all());
        //dd($request->all());
        return new AppreciationsResource($appreciations);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $appreciations = Appreciation::find($id);
        $appreciations->delete();

        return response(null, 204);
    }
}
