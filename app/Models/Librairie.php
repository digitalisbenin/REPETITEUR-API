<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
class Librairie extends Model
{
    use HasFactory,Uuid ;
    protected $fillable = ['librairieUrl','name','description','created_at', 'updated_at'];
}
