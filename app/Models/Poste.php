<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Poste extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['demande_id', 'content','created_at', 'updated_at'];

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
