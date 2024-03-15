<?php

namespace App\Http\Resources\Poste;

use App\Http\Resources\Demande\DemandeResource;
use App\Http\Resources\Enfants\EnfantsResource;
use App\Http\Resources\Parents\ParentsResource;
use App\Http\Resources\Repetiteur\RepetiteurResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PosteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);
      return[
        'id' => $this->id,
        'appreciation_parents'=>$this->appreciation_parents,
        'appreciation_repetiteur'=>$this->appreciation_repetiteur,
        'poste'=>$this->poste,
        'message'=>$this->message,
        'objet'=>$this->objet,
        'datee'=>$this->datee,
        'reponse_parents'=>$this->reponse_parents,
        'reponse_admin'=>$this->reponse_admin,
        'repetiteur'=>new RepetiteurResource($this->repetiteur),
        'demande'=>new DemandeResource($this->demande),
        'parents'=>new ParentsResource($this->parents),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
      ];
    }
}
