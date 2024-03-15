<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classe extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['name','created_at', 'updated_at'];

    public function demande()
        {
            return $this->hasMany(Demande::class);
        }
        public function tarification()
        {
            return $this->hasMany(Tarification::class);
        }
        public function repetiteurMatiereClasses()
        {
            return $this->hasMany(RepetiteurMatiereClasse::class);
        }


        public function repetiteurs()
    {
        return $this->belongsToMany(Repetiteur::class, 'repetiteur_matiere_classes', 'classe_id', 'repetiteur_id');
    }
}
