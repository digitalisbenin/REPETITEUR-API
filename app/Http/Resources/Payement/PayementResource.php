<?php

namespace App\Http\Resources\Payement;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Parents\ParentsResource;
class PayementResource extends JsonResource
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
       return[
        'id' => $this->id,
        'name'=>$this->name,
        'date'=>$this->date,
        'mois'=>$this->mois,
        'status'=>$this->status,
        'reference'=>$this->reference,
        'parents'=>new ParentsResource($this->parents),
       ];
    }
}
