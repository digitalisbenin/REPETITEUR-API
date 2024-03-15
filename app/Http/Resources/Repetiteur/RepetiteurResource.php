<?php

namespace App\Http\Resources\Repetiteur;

use App\Http\Resources\Commune\CommuneRessource;
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
        'diplome_imageUrl'=>$this->diplome_imageUrl,
        'profil_imageUrl'=>$this->profil_imageUrl,
        'adresse'=>$this->adresse,
        'description'=>$this->description,
        'phone'=>$this->phone,
        'sexe'=>$this->sexe,
        'cycle'=>$this->cycle,
        'etats'=>$this->etats,
        'commune'=>new CommuneRessource($this->commune),
        'evaluation'=>$this->evaluation,
        'traitementDossiers'=>$this->traitementDossiers,
        'matricule'=>$this->matricule,
        'dateLieuNaissance'=>$this->dateLieuNaissance,
        'situationMatrimoniale'=>$this->situationMatrimoniale,
        'niveauEtude'=>$this->niveauEtude,
        'heureDisponibilite'=>$this->heureDisponibilite,
        'identite'=>$this->identite,
        'casierJudiciaire'=>$this->casierJudiciaire,
        'attestationResidence'=>$this->attestationResidence,
        'grade'=>$this->grade,
        'status'=>$this->status,
        'experience'=>$this->experience,
        'ecole'=>$this->ecole,
        'user'=> new UserResource($this->user),
        'created_at'=>$this->created_at,
        'updated_at'=>$this->updated_at,
       ];
    }
}
