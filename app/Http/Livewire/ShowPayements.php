<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Payement;
use App\Models\Demande;
use App\Models\Enfants;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ShowPayements extends Component
{
    use LivewireAlert;
    public Payement $deleting;
    public Payement $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;
    public $statusFilterImpaye = false;
    public $statusFilterPaye = false;
    public $startDate;
    public $endDate;
    public $anneeEnCours;
    public $existingEntry;
    public $errorMessage;
    public $errorMessages;
    public $dateActuelle;
    public $dateEcheance;
    public $showErrorMessage = false;
    public $delay = 3000;
    public function rules()
    {
        return [


            'editing.mois' => 'required|min:2',
           // 'editing.reference' => 'required|min:1',
           // 'editing.phone' => 'required|min:1',
            'editing.date' => 'required|min:1',
            //'editing.annee' => 'required|min:1',
            // 'editing.demande_id' => 'required',
            // 'editing.status' => 'required',
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
        $this->action = 'Initialiser un Paiement';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un paiement');
    }



    public function save()
    {

        $this->validate();
        $existingEntry = Payement::where('mois',$this->editing->mois )->where('annee',$this->anneeEnCours = date('Y'))->first();
        // dd($existingEntry);
        $dateActuelle = Carbon::now();
        $dateEcheance = Carbon::createFromFormat('Y-m-d', $this->editing->date);

             if($existingEntry) {
                //  $this->notify('Vous avez déjà ajouté ce mois et cette année');
               // $this->errorMessage = 'Vous avez déjà ajouté ce mois et cette année.';
                //$this->afficherMessageErreur($this->errorMessage);

                $this->alert('error', 'Vous avez déjà ajouté ce mois et cette année.', [
                    'position' => 'top-end',
                    'timer' => 5000,
                    'toast' => true,
                   ]);
                $this->showEditModal = false;

             }else if($dateEcheance->lte($dateActuelle)){
                //$this->errorMessage = "La date de l'écheance doit être supérieur à la date d'initiation ";
               // $this->afficherMessageErreur($this->errorMessage);
               $this->alert('error', "Veuillez revoir la date d'échéance", [
                'position' => 'top-end',
                'timer' => 5000,
                'toast' => true,
               ]);
                $this->showEditModal = false;
             }


             else {
                $demandeIds = Demande::where('status', 'Validé')->pluck('id');
                $nouveauxPayementsIds = [];
                $parentIds = Demande::whereIn('id', $demandeIds)
                    ->with('enfants.parents.user')
                    ->get()
                    ->pluck('enfants.parents.user.id');




                 foreach ($demandeIds as $demandeId) {

                    $nouveauPayement=  Payement::create([
                          'demande_id' => $demandeId,
                         'mois' => $this->editing->mois,
                        'annee' => $this->anneeEnCours = date('Y'),
                         'date' => $this->editing->date,
                      ]);
                    $nouveauxPayementsIds[] = $nouveauPayement->id;
                     }
                     //dd($nouveauxPayementsIds);
         //$demandeIdsArray = $demandeIds->toArray();

                    $parentIdsArray = $parentIds->toArray();


        if (count($nouveauxPayementsIds) === count($parentIdsArray)) {

            $pairs = array_combine($nouveauxPayementsIds, $parentIdsArray);

            foreach ($pairs as $nouveauxPayementsId => $parentId) {

                if ($parentId) {
                    Notification::create([
                        'payement_id' => $nouveauxPayementsId,
                        'message' => "Nouveau paiement",
                        'type' => "paiement",
                        'user_id' => $parentId,
                    ]);
                }
            }
        } else {
            // Les tableaux n'ont pas la même longueur, gérer cette situation selon vos besoins
            // ...
        }



               //  }

        //dd($parentIds);




               // dd($demandeIds);
                // $this->editing->save();
                $this->alert('success', 'Enregistrement effectué avec succès', [
                    'position' => 'top-end',
                    'timer' => 5000,
                    'toast' => true,
                   ]);
                 //$this->notify('Enregistrement effectué avec succès');
                 $this->showEditModal = false;

             }

        // $demandeIds = Demande::where('status', 'Validé')->pluck('id');
        // $nouveauxPayementsIds = [];
        // $parentIds = Demande::whereIn('id', $demandeIds)
        //     ->with('enfants.parents.user')
        //     ->get()
        //     ->pluck('enfants.parents.user.id');




        //  foreach ($demandeIds as $demandeId) {

        //     $nouveauPayement=  Payement::create([
        //           'demande_id' => $demandeId,
        //          'mois' => $this->editing->mois,
        //         'annee' => $this->anneeEnCours = date('Y'),
        //          'date' => $this->editing->date,
        //       ]);
        //     $nouveauxPayementsIds[] = $nouveauPayement->id;
        //      }
             //dd($nouveauxPayementsIds);
 //$demandeIdsArray = $demandeIds->toArray();

//             $parentIdsArray = $parentIds->toArray();


// if (count($nouveauxPayementsIds) === count($parentIdsArray)) {

//     $pairs = array_combine($nouveauxPayementsIds, $parentIdsArray);

//     foreach ($pairs as $nouveauxPayementsId => $parentId) {

//         if ($parentId) {
//             Notification::create([
//                 'payement_id' => $nouveauxPayementsId,
//                 'message' => "Nouveau paiement",
//                 'type' => "paiement",
//                 'user_id' => $parentId,
//             ]);
//         }
//     }
// } else {
    // Les tableaux n'ont pas la même longueur, gérer cette situation selon vos besoins
    // ...
//}



       //  }

//dd($parentIds);




       // dd($demandeIds);
        // $this->editing->save();
        //  $this->notify('Enregistrement effectué avec succès');
        //  $this->showEditModal = false;
    }
    public function notify($message)
    {
        Session::flash('message', $message);
    }
    // Ajoutez cette méthode à votre composant
public function toggleStatusFilter($status)
{
    if ($status === 'Impayer') {
        $this->statusFilterImpaye = !$this->statusFilterImpaye;
        $this->statusFilterPaye = false; // Désactiver l'autre filtre
    } elseif ($status === 'Payer') {
        $this->statusFilterPaye = !$this->statusFilterPaye;
        $this->statusFilterImpaye = false; // Désactiver l'autre filtre
    }

    // Rafraîchir la liste des paiements
  //  $this->render();
}


    // public function render()
    // {
    //     $payements = Payement::latest('created_at')->get();
    //     return view('livewire.show-payements',[
    //         'payements' => $payements,
    //         'demande'=> Demande::all(),
    //     ]);
    // }

    public function afficherMessageErreur($messages)
    {
       // dd($messages);
       // $this->errorMessages = $this->errorMessage;
        $this->errorMessages = $messages;
        $this->showErrorMessage = true; // Afficher le message d'erreur

        // Masquer le message d'erreur après 5 secondes
        $this->dispatchBrowserEvent('masquerMessageErreur', ['delay' => 3000]);
    }

    public function render()
{
    $query = Payement::latest('created_at');

    // Ajoutez ces conditions pour filtrer par statut s'il est défini
    if ($this->statusFilterImpaye) {
        $query->where('status', 'Impayer');
    }

    if ($this->statusFilterPaye) {
        $query->where('status', 'Payer');
    }

    $payements = $query->get();


    if ($this->startDate && $this->endDate) {
        $query = Payement::query();
        $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
    }

    $payements = $query->latest('created_at')->get();

    return view('livewire.show-payements', [
        'payements' => $payements,
        'demande' => Demande::all(),
    ]);


}


}
