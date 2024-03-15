<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory ,Uuid;
    protected $fillable = ['prix','classe_id', 'matiere_id','created_at', 'updated_at'];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
