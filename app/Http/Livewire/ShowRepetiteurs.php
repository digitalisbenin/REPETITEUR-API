<?php

namespace App\Http\Livewire;

use App\Models\Matiere;
use App\Models\Repetiteur;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ShowRepetiteurs extends Component
{

    public Repetiteur $deleting;
    public Repetiteur $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.fname' => 'required|min:2',
            'editing.lname' => 'required|min:2',
            'editing.classe' => 'required|min:1',
            'editing.phone' => 'required|min:1',
            'editing.adresse' => 'required|min:1',
            'editing.sexe' => 'required|min:1',
            'editing.diplome_imageUrl' => 'required|min:1',
            'editing.profil_imageUrl' => 'required|min:1',
            'editing.grade' => 'required|min:1',
            'editing.ecole' => 'required|min:1',
            'editing.experience' => 'required|min:1',
            'editing.status' => 'required|min:1',
            'editing.user_id' => 'required',
            'editing.matiere_id' => 'required',
        ];
    }


    public function delete(Repetiteur $repetiteurs)
    {
        $this->deleting = $repetiteurs;
        $this->action = 'Supprimer un Repetiteur';
        $this->showDeleteModal = true;
    }

    public function edit(Repetiteur $repetiteurs)
    {
        $this->editing = $repetiteurs;
        $this->action = 'Modifier un Repetiteur';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Repetiteur();
        $this->action = 'Ajouter un Repetiteur';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un Repetiteur');
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();
        $this->notify('Enregistrement effectué avec succès');
        $this->showEditModal = false;
    }
    public function notify($message)
    {
        Session::flash('message', $message);
    }

    public function render()
    {

        return view('livewire.show-repetiteurs',[
            'repetiteurs'=> Repetiteur::all(),
            'matiere'=> Matiere::all(),
            'users'=> User::all(),

        ]);
    }

}
