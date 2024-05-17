<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PresenceAuPoste extends Model
{
    use HasFactory,Uuid;
    protected $fillable = [ 'repetiteur_id','poste', 'message', 'mois','datee', 'created_at', 'updated_at'];
    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);
    } 


}
