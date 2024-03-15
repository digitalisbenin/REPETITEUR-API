<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publicite\StorePubliciteRequest;
use App\Http\Requests\Publicite\UpdatePubliciteRequest;
use App\Http\Resources\Publicite\PubliciteCollection;
use App\Http\Resources\Publicite\PubliciteResource;
use App\Models\Publicite;
use Illuminate\Http\Request;

class PubliciteController extends Controller
{
    //
            /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicite = Publicite::latest('created_at')->get();
        return new PubliciteCollection($publicite);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePubliciteRequest $request)
    {
        $publicite = Publicite::create($request->all());

        return new PubliciteResource($publicite);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {   $publicite = Publicite::find($id);
        return new PubliciteResource($publicite);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePubliciteRequest $request, $id)
    {   $publicite = Publicite::find($id);
        $publicite->update($request->all());

        return new PubliciteResource($publicite);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $publicite = Publicite::find($id);
        $publicite->delete();

        return response(null, 204);
    }
}
