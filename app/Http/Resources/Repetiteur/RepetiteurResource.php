<?php

namespace App\Http\Resources\Repetiteur;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Matiere\MatiereResource;
use App\Http\Resources\Enfants\EnfantsResource;
class RepetiteurResource extends JsonResource
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
        'diplome_photo_path'=>$this->diplome_photo_path,
        'adresse'=>$this->adresse,
        'phone'=>$this->phone,
        'user'=> new UserResource($this->user),
        'matiere'=> new MatiereResource($this->matiere),
        'enfants'=> new EnfantsResource($this->enfants),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
       ];
    }
}