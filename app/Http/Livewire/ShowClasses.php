<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ShowClasses extends Component
{

    use LivewireAlert;
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
        $this->alert('success', 'Vous avez supprimé un classe', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
           ]);
        //$this->notify('Vous avez supprimé une Classe');
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
