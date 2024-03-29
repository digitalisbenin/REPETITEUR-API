<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Payement extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['user_id', 'demande_id','name' ,'reference','mois','status','date','annee','created_at', 'updated_at'];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



