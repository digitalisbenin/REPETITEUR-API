<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowClasses extends Component
{


    public Classe $deleting;
    public Classe $editing;
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

    public function delete(Classe $classe)
    {
        $this->deleting = $classe;
        $this->action = 'Supprimer une Classe';
        $this->showDeleteModal = true;
    }

    public function edit(Classe $classe)
    {
        $this->editing = $classe;
        $this->action = 'Modifier une Classe';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Classe();
        $this->action = 'Ajouter une Classe';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une Classe');
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
        return view('livewire.show-classes',[
            'classe'=> Classe::all(),
        ]);
    }

}
