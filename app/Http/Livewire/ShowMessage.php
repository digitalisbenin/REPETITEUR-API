<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
class ShowMessage extends Component
{


    public Message $deleting;
    public Message $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [

            'editing.reponse_admin' => 'required|min:2',
            'editing.message' => 'required|min:2',


        ];
    }


    public function delete(Message $message)
    {
        $this->deleting = $message;
        $this->action = 'Supprimer un Enfants';
        $this->showDeleteModal = true;
    }

    public function edit(Message $message)
    {
        $this->editing = $message;
        $this->action = 'Répondre au Message';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Message();
        $this->action = 'Ajouter un Message';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un Message');
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

        return view('livewire.show-message',[
            'message'=> Message::all(),
            

        ]);
    }

}
