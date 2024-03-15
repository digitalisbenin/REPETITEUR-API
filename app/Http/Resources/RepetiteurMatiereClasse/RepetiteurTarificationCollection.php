<?php

namespace App\Http\Resources\RepetiteurMatiereClasse;

use App\Http\Resources\Tarification\TarificationCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RepetiteurTarificationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'repetiteur_matiere_classe' => RepetiteurMatiereClasseResource::collection($this->collection),
            'tarification' => TarificationCollection::collection($this->collection),
        ];
    }
}
