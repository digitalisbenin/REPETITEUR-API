<?php

namespace App\Http\Resources\Demande;

use App\Http\Resources\Enfants\EnfantsResource;
use App\Http\Resources\Matiere\MatiereResource;
use App\Http\Resources\Parents\ParentsResource;
use App\Http\Resources\Repetiteur\RepetiteurResource;
use App\Http\Resources\Tarification\TarificationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DemandeResource extends JsonResource
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
        'description'=>$this->description,
        'status'=>$this->status,
        'motif'=>$this->motif,
        'enfants'=>new EnfantsResource($this->enfants),
        'tarification'=>new TarificationResource($this->tarification),
        'repetiteur'=>new RepetiteurResource($this->repetiteur),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
       ];
    }
}
