<?php

namespace App\Http\Resources\Epreuve;
use App\Http\Resources\Matiere\MatiereResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EpreuveResource extends JsonResource
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
        //return parent::toArray($request);
        return[
            'id' => $this->id,
            'name'=>$this->name,
            'epreuve'=>$this->epreuve,
            'classe'=>$this->classe,
            'corrige'=>$this->corrige,
            'matiere'=>new MatiereResource($this->matiere),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
