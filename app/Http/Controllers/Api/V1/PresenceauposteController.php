<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PresenceAuPoste\StorePresenceauposteRequest;
use App\Http\Requests\PresenceAuPoste\UpdatePresenceauposteRequest;
use App\Http\Resources\PresenceAuPoste\PresenceauposteCollection;
use App\Http\Resources\PresenceAuPoste\PresenceauposteResource;
use App\Models\PresenceAuPoste;
use Illuminate\Http\Request;

class PresenceauposteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $query = PresenceAuPoste::query();
        if ($request->has('user_id')) {
            $query->whereHas('repetiteur', function($query) use ($request) {
                $query->where('user_id', $request->input('user_id'));
            });
        }
        $presenceaupostes = $query->latest('created_at')->get();
        return new PresenceauposteCollection($presenceaupostes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresenceauposteRequest $request)
    {
        $presenceaupostes = PresenceAuPoste::create($request->all());

        return new PresenceauposteResource($presenceaupostes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presenceaupostes = PresenceAuPoste::find($id);
        return new PresenceauposteResource($presenceaupostes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresenceauposteRequest $request, $id)
    {
        $presenceaupostes = PresenceAuPoste::find($id);
        $presenceaupostes->update($request->all());
        //dd($request->all());
        return new PresenceauposteResource($presenceaupostes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presenceaupostes = PresenceAuPoste::find($id);
        $presenceaupostes->delete();
        return response(null, 204);
    }
}
