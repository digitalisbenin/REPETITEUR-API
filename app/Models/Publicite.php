<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicite extends Model
{
    use HasFactory,Uuid;
    protected $fillable = ['publiciteUrl', 'titre','created_at', 'updated_at'];
}
