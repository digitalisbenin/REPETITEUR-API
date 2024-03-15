<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Repetiteur;
use App\Models\RepetiteurMatiereClasse;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowRepetiteurMatiereClasses extends Component
{


    public RepetiteurMatiereClasse $deleting;
    public RepetiteurMatiereClasse $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.repetiteur_id' => 'required|min:2',
            'editing.classe_id' => 'required|min:2',
            'editing.matiere_id' => 'required',
        ];
    }


    public function delete(RepetiteurMatiereClasse $repetiteurmcs)
    {
        $this->deleting = $repetiteurmcs;
        $this->action = 'Supprimer une Tarification';
        $this->showDeleteModal = true;
    }

    public function edit(RepetiteurMatiereClasse $repetiteurmcs)
    {
        $this->editing = $repetiteurmcs;
        $this->action = 'Modifier un Repetiteur';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new RepetiteurMatiereClasse();
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

        return view('livewire.show-repetiteur-matiere-classes',[
            'repetiteurmcs'=> RepetiteurMatiereClasse::all(),
            'matiere'=> Matiere::all(),
            'classe'=> Classe::all(),
            'repetiteur'=> Repetiteur::all(),

        ]);
    }

}
