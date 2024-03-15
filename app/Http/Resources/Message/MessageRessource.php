<?php

namespace App\Http\Resources\Message;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageRessource extends JsonResource
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

       return[
        'id' => $this->id,
        'name'=>$this->name,
        'phone'=>$this->phone,
        'email'=>$this->email,
        'objet'=>$this->objet,
        'message'=>$this->message,
        'reponse_admin'=>$this->reponse_admin,
        'user'=> new UserResource($this->user),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
        ];
    }
}
