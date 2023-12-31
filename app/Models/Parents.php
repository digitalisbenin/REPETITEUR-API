<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parents extends Model
{
    use HasFactory ,Uuid;

    protected $fillable = ['user_id','fname', 'lname' ,'adresse','phone','created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function demande()
    {
        return $this->hasMany(Demande::class);
    }
}
