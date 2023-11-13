<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Payement extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['demande_id','name', 'phone' ,'reference','mois','status','date','annee','created_at', 'updated_at'];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}



