<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Payement extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['parents_id','name', 'phone' ,'reference','mois','status','date','created_at', 'updated_at'];

    public function parents()
    {
        return $this->belongsTo(Parents::class);
    }
}



