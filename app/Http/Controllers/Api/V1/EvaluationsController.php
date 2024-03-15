<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Evaluation\StoreEvaluationRequest;
use App\Http\Resources\Evaluation\EvaluationCollection;
use App\Http\Resources\Evaluation\EvaluationResource;
use App\Models\Evaluations;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
    //
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EvaluationCollection(Evaluations::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        $evaluation = Evaluations::create($request->all());

        return new EvaluationResource($evaluation);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $evaluation = Evaluations::find($id);
        return new EvaluationResource($evaluation);
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $evaluation=Evaluations::findOrFail($id);
        $evaluation->delete();

        return response(null, 204);
    }
}
