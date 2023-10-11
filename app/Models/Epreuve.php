<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['epreuve', 'classe','corrige','matiere_id'];


    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
