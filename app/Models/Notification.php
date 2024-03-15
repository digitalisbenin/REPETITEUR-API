<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notification extends Model
{
    use HasFactory,Uuid;
    protected $fillable = ['user_id','type','demande_id','repetiteur_id', 'status','message_id','payement_id','message','created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function repetiteur()
    {
        return $this->belongsTo(Repetiteur::class);
    }
    public function payement()
    {
        return $this->belongsTo(Payement::class);}

        public function message()
    {
        return $this->belongsTo(Message::class);
    }
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
