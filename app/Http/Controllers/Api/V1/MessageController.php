<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Http\Resources\Message\MessageCollection;
use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\MessageRessource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Message::query();

        if ($request->has('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        $message = $query->latest('created_at')->get();
        return new MessageCollection( $message) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->all());

        return new MessageResource($message);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $message = Message::find($id);
        return new MessageResource($message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, $id)
    {
        $message = Message::find($id);
        $message->update($request->all());

        return new MessageResource($message);
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
