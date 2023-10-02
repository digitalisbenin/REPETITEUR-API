<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payement\StorePayementRequest;
use App\Http\Requests\Payement\UpdatePayementRequest;
use App\Http\Resources\Payement\PayementCollection;
use App\Http\Resources\Payement\PayementResource;
use App\Models\Payement;
use Illuminate\Http\Request;

class PayementController extends ApiController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PayementCollection(Payement::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayementRequest $request)
    {
        $payements = Payement::create($request->all());

        return new PayementResource($payements);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $payements=Payement::findOrFail($id);
        return new PayementResource($payements);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePayementRequest $request, $id)
    {
        $payements=Payement::findOrFail($id);
        $payements->update($request->all());

        return new PayementResource($payements);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $payements=Payement::findOrFail($id);
        $payements->delete();

        return response(null, 204);
    }
}
