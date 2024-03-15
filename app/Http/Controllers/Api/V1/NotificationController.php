<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notification\StoreNotificationRequest;
use App\Http\Requests\Notification\UpdateNotificationRequest;
use App\Http\Resources\Notification\NotificationCollection;
use App\Http\Resources\Notification\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Notification::query();

        if ($request->has('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        $notification = $query->latest()->get();

        return new NotificationCollection($notification);
       // return new NotificationCollection(Notification::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->all());

        return new NotificationResource($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        $notification = Notification::find($id);
        return new NotificationResource($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, $id)
    {
        $notification = Notification::find($id);
        $notification->update($request->all());

        return new NotificationResource($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $notification = Notification::find($id);
        $notification->delete();

        return response(null, 204);
    }
}
