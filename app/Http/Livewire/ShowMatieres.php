<?php

namespace App\Http\Livewire;
use App\Models\Matiere;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowMatieres extends Component
{
    public Matiere $deleting;
    public Matiere $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;


    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',

        ];
    }

    public function delete(Matiere $matiere)
    {
        $this->deleting = $matiere;
        $this->action = 'Supprimer une matiere';
        $this->showDeleteModal = true;
    }

    public function edit(Matiere $matiere)
    {
        $this->editing = $matiere;
        $this->action = 'Modifier une Matiere';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Matiere();
        $this->action = 'Ajouter une Matiere';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une Matiere');
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
        return view('livewire.show-matieres',[
            'matiere'=> Matiere::all(),
        ]);
    }


}
