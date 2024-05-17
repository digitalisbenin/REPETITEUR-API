<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

use App\Models\Appreciation;
use App\Models\Repetiteur;
use App\Models\Demande;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShowAppreciations extends Component
{
    use LivewireAlert;
    public Appreciation $deleting;
    public Appreciation $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function notify($message)
    {
        Session::flash('message', $message);
    }
    public function rules()
    {
        return [
            'editing.reponse_admin' => 'required|min:2',
            

            //'editing.user_id' => 'required',

        ];
    }

    public function delete(Appreciation $postes)
    {
        $this->deleting = $postes;
        $this->action = 'Supprimer un poste';
        $this->showDeleteModal = true;
    }

    public function edit(Appreciation $postes)
    {
        $this->editing = $postes;
        $this->action = 'Réponse Admin';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Appreciation();
        $this->action = 'Ajouter un Appréciations';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un poste');
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();
       // $this->notify('Enregistrement effectué avec succès');
        $this->alert('success', 'Enregistrement effectué avec succès', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
           ]);
        $this->showEditModal = false;
    }

 

    public function render()
    {
        return view('livewire.show-appreciations',[
            'appreciations'=> Appreciation::all(),
            'demande'=>Demande::all(),
            //'repetiteurs'=> Repetiteur::all(),
            //'users'=> User::all(),
        ]);
    }
}
