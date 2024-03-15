<?php

namespace App\Http\Livewire;

use App\Models\Commune;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ShowCommune extends Component
{



    public Commune $deleting;
    public Commune $editing;
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

    public function delete(Commune $commune)
    {
        $this->deleting = $commune;
        $this->action = 'Supprimer une Commune';
        $this->showDeleteModal = true;
    }

    public function edit(Commune $commune)
    {
        $this->editing = $commune;
        $this->action = 'Modifier une Commune';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Commune();
        $this->action = 'Ajouter une Commune';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une Commune');
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
        return view('livewire.show-commune',[
            'commune'=> Commune::all(),
        ]);
    }

}
