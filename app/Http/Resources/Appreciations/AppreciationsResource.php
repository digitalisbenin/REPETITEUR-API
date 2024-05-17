<?php

namespace App\Http\Resources\Appreciations;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Demande\DemandeResource;
use App\Http\Resources\Parents\ParentsResource;
class AppreciationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
'id'=>$this->id,         
 'appreciation_parents'=>$this->appreciation_parents,
  'objet'=>$this->objet,
  'reponse_admin'=>$this->reponse_admin,
 'demande'=>new DemandeResource($this->demande),
 'parents'=>new ParentsResource($this->parents),
 'created_at'=>$this->created_at,
 'updated_at'=>$this->updated_at,

        ];
    }
}
