<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Repetiteur extends Model
{
    use HasFactory,Uuid;

    protected $fillable = ['fname', 'lname', 'matiere','diplome_photo_path','status','user_id','enfants_id','matiere_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enfants()
        {
            return $this->belongsTo(Enfants::class);
        }
     public function poste()
        {
            return $this->hasMany(Poste::class);
        }
     public function matiere()
        {
            return $this->belongsTo(Matiere::class);
        }

       /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    // protected $appends = [
    //     'diplome_photo_path',
    // ];
}
