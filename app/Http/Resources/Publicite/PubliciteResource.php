<?php

namespace App\Http\Resources\Publicite;

use Illuminate\Http\Resources\Json\JsonResource;

class PubliciteResource extends JsonResource
{
           /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;
    /**
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return[
        'id' => $this->id,
        'publiciteUrl'=>$this->publiciteUrl,
        'titre'=>$this->titre,
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
    ];
    }
}
