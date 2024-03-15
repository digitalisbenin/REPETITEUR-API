<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Parents;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ShowParents extends Component
{
    public Parents $deleting;
    public Parents $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;



    public function rules()
    {
        return [


            'editing.status' => 'required',



        ];
    }
    public function notify($message)
    {
        Session::flash('message', $message);
    }

    public function delete(Parents $parents)
    {
        $this->deleting = $parents;
        $this->action = 'Supprimer un parents';
        $this->showDeleteModal = true;
    }

    public function edit(Parents $parents)
    {
        $this->editing = $parents;
        $this->action = 'Etat d\' un parents';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Parents();
        $this->action = 'Ajouter un parents';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un parents');
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();

        $this->notify('Enregistrement effectué avec succès');
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.show-parents',[
            'parents'=> Parents::all(),
            'users'=> User::all(),
        ]);
    }

}
