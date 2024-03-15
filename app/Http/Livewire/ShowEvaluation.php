<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Session;
use App\Models\Evaluations;
use Livewire\Component;

class ShowEvaluation extends Component
{



    public Evaluations $deleting;
    public Evaluations $editing;
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

    public function delete(Evaluations $evaluation)
    {
        $this->deleting = $evaluation;
        $this->action = 'Supprimer une Commune';
        $this->showDeleteModal = true;
    }

    public function edit(Evaluations $evaluation)
    {
        $this->editing = $evaluation;
        $this->action = 'Modifier une Evaluation';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Evaluations();
        $this->action = 'Ajouter une Evaluations';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une Evaluations');
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
        return view('livewire.show-evaluation',[
            'evaluation'=> Evaluations::all(),
        ]);
    }

}
