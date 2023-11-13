<?php

namespace App\Http\Livewire;

use App\Models\Demande;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

use App\Models\Poste;
use App\Models\Repetiteur;
use App\Models\User;
class ShowPostes extends Component
{

        public Poste $deleting;
        public Poste $editing;
        public $showDeleteModal = false;
        public $showEditModal = false;
        public $action = '';
        public $search;

        public function notify($message)
        {
            Session::flash('message', $message);
        }
        public function rules()
        {
            return [
                'editing.content' => 'required|min:2',
                'editing.demande_id' => 'required',

                //'editing.user_id' => 'required',

            ];
        }

        public function delete(Poste $postes)
        {
            $this->deleting = $postes;
            $this->action = 'Supprimer un poste';
            $this->showDeleteModal = true;
        }

        public function edit(Poste $postes)
        {
            $this->editing = $postes;
            $this->action = 'Modifier un poste';
            $this->showEditModal = true;
        }

        public function create()
        {
            $this->editing = new Poste();
            $this->action = 'Ajouter un poste';
            $this->showEditModal = true;
        }
        public function deleteSelected()
        {
            $this->deleting->delete();

            $this->showDeleteModal = false;

            $this->notify('Vous avez supprimé un poste');
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
            return view('livewire.show-postes',[
                'postes'=> Poste::all(),
                'demande'=>Demande::all(),
                //'repetiteurs'=> Repetiteur::all(),
                //'users'=> User::all(),
            ]);
        }

}
