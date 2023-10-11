<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

use App\Models\Payement;

use App\Models\User;

class ShowPayements extends Component
{

    public Payement $deleting;
    public Payement $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.mois' => 'required|min:2',
            'editing.reference' => 'required|min:1',
            'editing.phone' => 'required|min:1',
            'editing.date' => 'required|min:1',
            'editing.parents_id' => 'required',
            'editing.status' => 'required',
        ];
    }


    public function delete(Payement $payements)
    {
        $this->deleting = $payements;
        $this->action = 'Supprimer un payement';
        $this->showDeleteModal = true;
    }

    public function edit(Payement $payements)
    {
        $this->editing = $payements;
        $this->action = 'Modifier un payement';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Payement();
        $this->action = 'Ajouter un Payement';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un payement');
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

        return view('livewire.show-payements',[
            'payements'=> Payement::all(),
            'users'=> User::all(),
        ]);
    }

}
