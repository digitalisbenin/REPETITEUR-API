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

    protected $fillable = ['fname', 'lname','classe', 'phone','diplome_imageUrl','profil_imageUrl','status','user_id','matiere_id','ecole','grade','sexe','experience','adresse','created_at', 'updated_at'];
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
