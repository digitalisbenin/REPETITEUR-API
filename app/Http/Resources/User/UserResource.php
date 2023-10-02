<?php

namespace App\Http\Resources\User;
use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
      //  return parent::toArray($request);
      return [
        'id' => $this->id,
        'name'=>$this->name,
        'role'=> new RoleResource($this->role),
        'email'=>$this->email,
        'email_verified_at'=>$this->email_verified_at,
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
    ];
    }
}
