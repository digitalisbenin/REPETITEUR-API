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
        'diplome_imageUrl'=>$this->diplome_imageUrl,
        'profil_imageUrl'=>$this->profil_imageUrl,
        'adresse'=>$this->adresse,
        'classe'=>$this->classe,
        'description'=>$this->description,
        'phone'=>$this->phone,
        'sexe'=>$this->sexe,
        'dateLieuNaissance'=>$this->dateLieuNaissance,
        'situationMatrimoniale'=>$this->situationMatrimoniale,
        'niveauEtude'=>$this->niveauEtude,
        'heureDisponibilite'=>$this->heureDisponibilite,
        'identite'=>$this->identite,
        'casierJudiciaire'=>$this->casierJudiciaire,
        'attestationResidence'=>$this->attestationResidence,
        'grade'=>$this->grade,
        'ecole'=>$this->ecole,
        'user'=> new UserResource($this->user),
        'matiere'=> new MatiereResource($this->matiere),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
       ];
    }
}
