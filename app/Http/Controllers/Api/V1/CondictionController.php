<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condiction\StoreCondictionRequest;
use App\Http\Requests\Condiction\UpdateCondictionRequest;
use App\Http\Resources\Condiction\CondictionCollection;
use App\Http\Resources\Condiction\CondictionResource;
use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Condiction;
use Illuminate\Http\Request;

class CondictionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Condiction::query();

        if ($request->has('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        $condiction = $query->latest('created_at')->get();

        return new CondictionCollection($condiction);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCondictionRequest $request)
    {
        $condiction = Condiction::create($request->all());

        return new CondictionResource($condiction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condiction  $condiction
     * @return \Illuminate\Http\Response
     */
    public function show(Condiction $condiction)
    {
        return new CondictionResource($condiction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Condiction  $condiction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCondictionRequest $request, Condiction $condiction)
    {
        $condiction->update($request->all());
        return new CondictionResource($condiction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condiction  $condiction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condiction $condiction)
    {
        $condiction->delete();

        return response(null, 204);
    }
}
