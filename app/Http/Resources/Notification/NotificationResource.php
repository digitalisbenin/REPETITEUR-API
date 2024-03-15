<?php

namespace App\Http\Resources\Notification;

use App\Http\Resources\Demande\DemandeResource;
use App\Http\Resources\Message\MessageRessource;
use App\Http\Resources\Payement\PayementResource;
use App\Http\Resources\Repetiteur\RepetiteurResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{


    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;
    /**


     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

return [
            'id' => $this->id,
            'type' =>$this->type,
            'message'=>$this->message,
            'status'=>$this->status,
            // 'demande'=>new DemandeResource($this->demande),
             //'payement'=>new PayementResource($this->payement),
            // 'message'=>new MessageRessource($this->message),
            // 'repetiteur'=>new RepetiteurResource($this->repetiteur),
            'user'=>new UserResource($this->user),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
];
    }
}

