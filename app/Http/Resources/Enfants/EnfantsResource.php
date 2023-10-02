<?php

namespace App\Http\Resources\Enfants;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Parents\ParentsResource;
use App\Http\Resources\Matiere\MatiereResource;
class EnfantsResource extends JsonResource
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
        'fname'=>$this->fname,
        'lname'=>$this->lname,
        'classe'=>$this->classe,
        'parents'=>new ParentsResource($this->parents),
        'matiere'=>new MatiereResource($this->matiere),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
       ];
    }
}
