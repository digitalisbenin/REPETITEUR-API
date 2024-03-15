<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Http\Resources\Message\MessageCollection;
use App\Http\Resources\Message\MessageRessource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MessageCollection(Message::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->all());

        return new MessageRessource($message);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $message = Message::find($id);
        return new MessageRessource($message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, $id)
    {
        $message = Message::find($id);
        $message->update($request->all());

        return new MessageRessource($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $message = Message::find($id);
        $message->delete();

        return response(null, 204);
    }
}
