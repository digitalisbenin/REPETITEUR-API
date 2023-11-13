<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Session;

use App\Models\Demande;
use App\Models\Matiere;
use App\Models\Parents;
use App\Models\Repetiteur;
use Livewire\Component;

class ShowDemande extends Component
{


    public Demande $deleting;
    public Demande $editing;
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
            'editing.status' => 'required|min:1',
            'editing.motif' => 'required|min:1',
            'editing.parents_id' => 'required',
            'editing.matiere_id' => 'required',
            'editing.repetiteur_id' => 'required',
        ];
    }


    public function delete(Demande $demande)
    {
        $this->deleting = $demande;
        $this->action = 'Supprimer une demande';
        $this->showDeleteModal = true;
    }

    public function edit(Demande $demande)
    {
        $this->editing = $demande;
        $this->action = 'Modifier une demande';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Demande();
        $this->action = 'Ajouter une demande';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une demande');
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

        return view('livewire.show-demande',[
            'demande'=> Demande::all(),
            'matiere'=> Matiere::all(),
            'parents'=> Parents::all(),
            'repetiteurs'=> Repetiteur::all(),
        ]);
    }
}
