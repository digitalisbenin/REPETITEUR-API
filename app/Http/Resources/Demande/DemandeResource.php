<?php

namespace App\Http\Resources\Demande;

use App\Http\Resources\Matiere\MatiereResource;
use App\Http\Resources\Parents\ParentsResource;
use App\Http\Resources\Repetiteur\RepetiteurResource;
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
        'fname'=>$this->fname,
        'lname'=>$this->lname,
        'classe'=>$this->classe,
        'parents'=>new ParentsResource($this->parents),
        'matiere'=>new MatiereResource($this->matiere),
        'repetiteur'=>new RepetiteurResource($this->repetiteur),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
       ];
    }
}
