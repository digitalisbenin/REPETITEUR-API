<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['name','epreuve', 'classe','corrige','matiere_id','created_at', 'updated_at'];


    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}
