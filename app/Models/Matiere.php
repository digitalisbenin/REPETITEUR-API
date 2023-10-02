<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matiere extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['name', 'description'];
    public function enfants()
        {
            return $this->hasMany(Enfants::class);
        }
}
