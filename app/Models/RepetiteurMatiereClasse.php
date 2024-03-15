<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class RepetiteurMatiereClasse extends Model
{
    use HasFactory ,Uuid;

    protected $fillable = ['repetiteur_id','classe_id', 'matiere_id','created_at', 'updated_at'];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);

    }
    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);

    }
    public function tarifications()
    {
        return $this->belongsTo(Tarification::class);

    }


}
