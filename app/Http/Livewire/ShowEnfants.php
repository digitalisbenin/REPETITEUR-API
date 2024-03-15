<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Session;

use App\Models\Enfants;
use App\Models\Matiere;
use App\Models\Parents;
use App\Models\Repetiteur;
use Livewire\Component;

class ShowEnfants extends Component
{

    public Enfants $deleting;
    public Enfants $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.fname' => 'required|min:2',
            'editing.lname' => 'required|min:2',
            'editing.parents_id' => 'required',

        ];
    }


    public function delete(Enfants $enfants)
    {
        $this->deleting = $enfants;
        $this->action = 'Supprimer un Enfants';
        $this->showDeleteModal = true;
    }

    public function edit(Enfants $enfants)
    {
        $this->editing = $enfants;
        $this->action = 'Modifier un Enfants';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Enfants();
        $this->action = 'Ajouter un Enfants';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un Enfants');
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

        return view('livewire.show-enfants',[
            'enfants'=> Enfants::all(),
            'parents'=> Parents::all(),

        ]);
    }


}
