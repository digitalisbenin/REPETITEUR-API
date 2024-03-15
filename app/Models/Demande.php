<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\Uuid;
use App\Events\NouvelleDemandeAjoutee;


class Demande extends Model
{
    use HasFactory,Uuid ;

    protected $fillable = ['fname', 'lname','adresse','description', 'enfants_id','tarification_id','repetiteur_id','status','motif', 'created_at', 'updated_at'];


    public function enfants()
    {
        return $this->belongsTo(Enfants::class);
    }

    public function poste()
    {
        return $this->hasMany(Poste::class);
    }
    public function tarification()
    {
        return $this->belongsTo(Tarification::class);
    }
    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);
    }
    public function creerNouvelleDemande($attributs)
{
    $nouvelleDemande = Demande::create($attributs);

    event(new NouvelleDemandeAjoutee($nouvelleDemande));

    return $nouvelleDemande;
}
}
