<?php

namespace App\Http\Resources\Evaluation;

use App\Http\Resources\Repetiteur\RepetiteurResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationResource extends JsonResource
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
       return[
        'id' => $this->id,
        'niveauEvaluation'=>$this->niveauEvaluation,
        'user'=> new UserResource($this->user),
        'repetiteur'=>new RepetiteurResource($this->repetiteur),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
        ];
    }
}
