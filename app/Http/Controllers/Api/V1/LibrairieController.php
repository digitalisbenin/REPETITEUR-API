<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Librairie\StoreLibrairieRequest;
use App\Http\Requests\Librairie\UpdateLibrairieRequest;
use App\Http\Resources\Librairie\LibrairieCollection;
use App\Http\Resources\Librairie\LibrairieResource;
use App\Models\Librairie;
use Illuminate\Http\Request;

class LibrairieController extends Controller
{
      //
            /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $librairie = Librairie::latest('created_at')->get();
        return new LibrairieCollection($librairie);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibrairieRequest $request)
    {
        $librairie = Librairie::create($request->all());

        return new LibrairieResource($librairie);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {   $librairie = Librairie::find($id);
        return new LibrairieResource($librairie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibrairieRequest $request, $id)
    {   $librairie = Librairie::find($id);
        $librairie->update($request->all());

        return new LibrairieResource($librairie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $librairie = Librairie::find($id);
        $librairie->delete();

        return response(null, 204);
    }
}
