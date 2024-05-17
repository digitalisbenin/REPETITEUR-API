<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appreciation extends Model
{
    use HasFactory,Uuid; 
     protected $fillable = ['demande_id', 'parents_id', 'appreciation_parents', 'reponse_admin','objet', 'created_at', 'updated_at'];

    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
    public function parents()
    {
        return $this->belongsTo(Parents::class);
    }


}
