<?php

namespace App\Http\Resources\Ecole;

use Illuminate\Http\Resources\Json\JsonResource;

class EcoleResource extends JsonResource
{
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
        'ecoleUrl'=>$this->ecoleUrl,
        'name'=>$this->name,
        'description'=>$this->description,
        'resultat'=>$this->resultat,
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
    ];
    }
}
