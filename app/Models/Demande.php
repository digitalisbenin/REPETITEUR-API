<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\Uuid;


class Demande extends Model
{
    use HasFactory,Uuid ;

    protected $fillable = ['fname', 'lname','classe','parents_id','matiere_id','repetiteur_id','status','motif', 'created_at', 'updated_at'];


    public function parents()
    {
        return $this->belongsTo(Parents::class);
    }

    public function poste()
    {
        return $this->hasMany(Poste::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);
    }
}
