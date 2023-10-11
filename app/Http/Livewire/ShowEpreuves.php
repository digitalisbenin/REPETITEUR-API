<?php

namespace App\Http\Livewire;

use App\Models\Epreuve;
use App\Models\Matiere;
use Livewire\Component;

use Illuminate\Support\Facades\Session;
class ShowEpreuves extends Component
{


    public Epreuve $deleting;
    public Epreuve $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.epreuve' => 'required|min:2',
            'editing.classe' => 'required|min:1',
            'editing.corrige' => 'required|min:1',
            'editing.matiere_id' => 'required',
        ];
    }


    public function delete(Epreuve $epreuves)
    {
        $this->deleting = $epreuves;
        $this->action = 'Supprimer une Epreuve';
        $this->showDeleteModal = true;
    }

    public function edit(Epreuve $epreuves)
    {
        $this->editing = $epreuves;
        $this->action = 'Modifier une Epreuve';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Epreuve();
        $this->action = 'Ajouter une Epreuve';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une Epreuve');
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

        return view('livewire.show-epreuves',[
            'epreuves'=> Epreuve::all(),
            'matiere'=> Matiere::all(),

        ]);
    }


}
