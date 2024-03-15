<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Tarification;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
class ShowTarifications extends Component
{

    public Tarification $deleting;
    public Tarification $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.prix' => 'required|min:2',
            'editing.classe_id' => 'required|min:2',
            'editing.matiere_id' => 'required',
        ];
    }


    public function delete(Tarification $tarification)
    {
        $this->deleting = $tarification;
        $this->action = 'Supprimer une Tarification';
        $this->showDeleteModal = true;
    }

    public function edit(Tarification $tarification)
    {
        $this->editing = $tarification;
        $this->action = 'Modifier une Tarification';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Tarification();
        $this->action = 'Ajouter une Tarification';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une Tarification');
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

        return view('livewire.show-tarifications',[
            'tarification'=> Tarification::all(),
            'matiere'=> Matiere::all(),
            'classe'=> Classe::all(),

        ]);
    }

}
