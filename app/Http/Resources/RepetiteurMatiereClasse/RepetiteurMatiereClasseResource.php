<?php

namespace App\Http\Resources\RepetiteurMatiereClasse;

use App\Http\Resources\Classe\ClasseResource;
use App\Http\Resources\Matiere\MatiereResource;
use App\Http\Resources\Repetiteur\RepetiteurResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RepetiteurMatiereClasseResource extends JsonResource
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
       return [
        'id' => $this->id,
        'matiere'=> new MatiereResource($this->matiere),
        'classe'=> new ClasseResource($this->classe),
        'repetiteur'=> new RepetiteurResource($this->repetiteur),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
    ];
    }
}
