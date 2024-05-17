<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Session;
use App\Models\Repetiteur;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ShowDetailsRepetiteur extends Component
{
    use LivewireAlert;

    // public $repetiteur;
    public $repetiteurId;
    public Repetiteur $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;

    public function rules()
    {
        return [

            // 'editing.classe' => 'required|min:1',
            // 'editing.phone' => 'required|min:1',
            // 'editing.adresse' => 'required|min:1',
            // 'editing.sexe' => 'required|min:1',
            // 'editing.diplome_imageUrl' => 'required',
            // 'editing.profil_imageUrl' => 'required|min:1',
           // 'editing.grade' => 'required|min:1',
            //'editing.notes' => 'required|min:1',
            //'editing.ecole' => 'required|min:1',
    // 'editing.description' => 'required|min:1',
            // 'editing.dateLieuNaissance' => 'required|min:1',
            // 'editing.situationMatrimoniale' => 'required|min:1',
           // 'editing.niveauEtude' => 'required|min:1',
            //'editing.heureDisponibilite' => 'required|min:1',
            // 'editing.identite' => 'required|min:1',
            // 'editing.casierJudiciaire' => 'required|min:1',
            // 'editing.attestationResidence' => 'required|min:1',
            //'editing.experience' => 'required|min:1',
            'editing.notes' => 'required|min:1',
            'editing.status' => 'required|min:1',
            'editing.evaluation' => 'required|min:1',
            'editing.traitementDossiers' => 'required|min:1',
            //'editing.user_id' => 'required',
            // 'editing.matiere_id' => 'required',
        ];
    }


    // protected $listeners = ['editRepDetails'];
    public function edit(Repetiteur $repetiteurs)
    {
        $this->editing = $repetiteurs;
        $this->action = 'Traiter le dossier  d\'un Répétiteur';
        $this->showEditModal = true;
    }
    public function save()
    {

    $this->validate();
    $this->editing->save();
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



    public function mount(){
        $this->repetiteurId = request('id');
        //dd( $this->repetiteurId);
    }

    public function render()
    {
        return view('livewire.show-details-repetiteur',[
            'repetiteur'=> Repetiteur::find($this->repetiteurId),
            // 'commentaires'=> Commentaire::where('blogs_id', $this->blog_id)->get(),
]);
    }

    // public function editRepDetails($repetiteurId)
    // {
    //     dd($repetiteurId);
    // }



}
