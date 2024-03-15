<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commune extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['name','created_at', 'updated_at'];
    public function commune()
    {
        return $this->belongsTo(Repetiteur::class);
    }
}
