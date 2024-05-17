<?php

namespace App\Http\Livewire;

use App\Models\PresenceAuPoste;
use App\Models\Repetiteur;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ShowPresenceauposte extends Component
{
    use LivewireAlert;
    public PresenceAuPoste $deleting;
    public PresenceAuPoste $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;
    public $existingEntry;
    public $errorMessage;
    public function rules()
    {
        return [

             'editing.mois' => 'required|min:1',
             'editing.datee' => 'required|min:1',
            // 'editing.enfants_id' => 'required',
            // 'editing.tarification_id' => 'required',
            // 'editing.repetiteur_id' => 'required',
        ];
    }


    public function delete(PresenceAuPoste $presenceAuPoste)
    {
        $this->deleting = $presenceAuPoste;
        $this->action = 'Supprimer une demande';
        $this->showDeleteModal = true;
    }

    public function edit(PresenceAuPoste $presenceAuPoste)
    {
        $this->editing = $presenceAuPoste;
        $this->action = 'Valider une présence au poste';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new PresenceAuPoste();
        $this->action = 'Initialiser une présence au poste';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une demande');
    }

    public function save()
    {
        $this->validate();

        //$this->editing->save();
        $annee = date('Y', strtotime($this->editing->datee));
        $existingEntry = PresenceAuPoste::where('mois',$this->editing->mois)->whereYear('datee', $annee)->first();
       // dd($existingEntry);
        
            if($existingEntry) {
                //$this->notify('Vous avez déjà ajouté ce mois et cette année');
               // $this->errorMessage = 'Vous avez déjà ajouté ce mois et cette année.';
                $this->alert('error', 'Vous avez déjà ajouté ce mois et cette année', [
                    'position' => 'top-end',
                    'timer' => 5000,
                    'toast' => true,
                   ]);
               $this->showEditModal = false;
           
            } else {
        
                $demandeIds = Repetiteur::where('traitementDossiers', 'Validé')->pluck('id');

                foreach ($demandeIds as $demandeId) {
       
                     PresenceAuPoste::create([
                         'repetiteur_id' => $demandeId,
                         'mois' => $this->editing->mois,
                        'datee' => $this->editing->datee,
       
                     ]);
       
                    }
                    $this->alert('success', 'Enregistrement effectué avec succès', [
                        'position' => 'top-end',
                        'timer' => 5000,
                        'toast' => true,
                       ]);  
              // $this->notify('Enregistrement effectué avec succès');
               $this->showEditModal = false;
            }

        // $demandeIds = Repetiteur::where('traitementDossiers', 'Validé')->pluck('id');

        //  foreach ($demandeIds as $demandeId) {

        //       PresenceAuPoste::create([
        //           'repetiteur_id' => $demandeId,
        //           'mois' => $this->editing->mois,
        //          'datee' => $this->editing->datee,

        //       ]);

        //      }
        // $this->notify('Enregistrement effectué avec succès');
        // $this->showEditModal = false;
    }
    public function notify($message)
    {
        Session::flash('message', $message);
    }

    public function render()
    {
        $presenceAuPostes = PresenceAuPoste::latest('created_at')->get();
        return view('livewire.show-presenceauposte',[
            'presenceauposte'=> $presenceAuPostes,

            'repetiteurs'=> Repetiteur::all(),
        ]);
    }
}
