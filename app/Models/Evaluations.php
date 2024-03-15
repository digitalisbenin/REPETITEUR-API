<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evaluations extends Model
{
    use HasFactory,Uuid;
    protected $fillable = ['niveauEvaluation', 'repetiteur_id', 'user_id','created_at', 'updated_at'];

    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
