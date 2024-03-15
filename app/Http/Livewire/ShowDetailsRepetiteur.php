<?php

namespace App\Http\Livewire;

use App\Models\Repetiteur;
use Livewire\Component;

class ShowDetailsRepetiteur extends Component
{
    // public $repetiteur;
    public $repetiteurId;

    // protected $listeners = ['editRepDetails'];

    public function mount(){
        $this->repetiteurId = request('id');
        //dd( $this->repetiteurId);
    }

    public function render()
    {
        return view('livewire.show-details-repetiteur',[
            'repetiteur'=> Repetiteur::find($this->repetiteurId),
            // 'commentaires'=> Commentaire::where('blogs_id', $this->blog_id)->get(),
]);
    }

    // public function editRepDetails($repetiteurId)
    // {
    //     dd($repetiteurId);
    // }



}
