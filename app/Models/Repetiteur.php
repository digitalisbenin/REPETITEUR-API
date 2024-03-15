<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Repetiteur extends Model
{
    use HasFactory,Uuid;

    protected $fillable = [ 'phone', 'commune_id', 'matricule', 'etats','evaluation','traitementDossiers', 'cycle','diplome_imageUrl','profil_imageUrl','status','user_id','ecole','grade','sexe','experience','adresse','description', 'dateLieuNaissance','situationMatrimoniale','niveauEtude','heureDisponibilite','identite','casierJudiciaire','attestationResidence', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function demande()
        {
            return $this->belongsTo(Demande::class);
        }
     public function poste()
        {
            return $this->hasMany(Poste::class);
        }
    //  public function matiere()
    //     {
    //         return $this->belongsToMany(Matiere::class);
    //     }
        public function matieresClasses()
        {
            return $this->hasMany(RepetiteurMatiereClasse::class);
        }
        public function matieres()
        {
            return $this->belongsToMany(Matiere::class);
        }

        public function classes()
        {
            return $this->belongsToMany(Classe::class);
        }



       /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    // protected $appends = [
    //     'diplome_photo_path',
    // ];
}
