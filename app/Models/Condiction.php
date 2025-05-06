<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condiction extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
