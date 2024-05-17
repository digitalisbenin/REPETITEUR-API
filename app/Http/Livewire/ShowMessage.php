<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Notification;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;




class ShowMessage extends Component
{

    use LivewireAlert;
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
        $this->alert('success', 'Vous avez supprimé un message', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
           ]);
    }

    public function save()
    {
        $this->validate();
       // dd($this->editing->user_id);

        $this->editing->save();
        Notification::create([
            'message_id' => $this->editing->id,
            'message' => "Réponse Admin",
            'type' => "reponse",
            'user_id' => $this->editing->user_id,
        ]);
        $this->alert('success', 'Enregistrement effectué avec succès', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
           ]);
        //$this->notify('Enregistrement effectué avec succès');
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
