<?php

namespace App\Http\Resources\PresenceAuPoste;

use App\Http\Resources\Repetiteur\RepetiteurResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PresenceauposteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id' => $this->id,
            'poste'=>$this->poste,
            'mois'=>$this->mois,
            'message'=>$this->message,
            'repetiteur'=>new RepetiteurResource($this->repetiteur),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
          ];
    }
}
