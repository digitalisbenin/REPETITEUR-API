<?php

namespace App\Http\Resources\Poste;

use App\Http\Resources\Enfants\EnfantsResource;
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
        'content'=>$this->content,
        'repetiteur'=>new RepetiteurResource($this->repetiteur),
        'enfants'=>new EnfantsResource($this->enfants),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
      ];
    }
}
