<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Poste extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['repetiteur_id','enfants_id', 'content'];

    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);
    }

    public function enfants()
    {
        return $this->belongsTo(Enfants::class);
    }
}
