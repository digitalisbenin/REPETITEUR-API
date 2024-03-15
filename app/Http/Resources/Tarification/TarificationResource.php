<?php

namespace App\Http\Resources\Tarification;

use App\Http\Resources\Classe\ClasseResource;
use App\Http\Resources\Matiere\MatiereResource;
use App\Http\Resources\Repetiteur\RepetiteurResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TarificationResource extends JsonResource
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
       // return parent::toArray($request);
       return [
        'id' => $this->id,
        'prix'=>$this->prix,
        'matiere'=> new MatiereResource($this->matiere),
        'classe'=> new ClasseResource($this->classe),
        'repetiteur' => $this->repetiteur ? new RepetiteurResource($this->repetiteur) : null, // Ajout du repetiteur
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
    ];
    }
}
