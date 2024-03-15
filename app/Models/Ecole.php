<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Ecole extends Model
{
    use HasFactory,Uuid;
    protected $fillable = ['ecoleUrl', 'name','description','resultat' ,'created_at', 'updated_at'];
}
