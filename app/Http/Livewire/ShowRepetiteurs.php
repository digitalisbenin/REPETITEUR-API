<?php

namespace App\Http\Livewire;

use App\Models\Matiere;
use App\Models\Repetiteur;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ShowRepetiteurs extends Component
{
    use WithFileUploads;
    public Repetiteur $deleting;
    public Repetiteur $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;
    public $file;
    public $pdffile;
    public $pdffileattestationResidence;
    public $attestationResidenceUrl;
    public $pdffilecasierJudiciaire;
    public $casierJudiciaireUrl;
    public $diplomeUrl;
    public $identiteUrl;
    public $pdffileidentite;


    public function getFileType(UploadedFile $file): string
{
    if ($file && $file->isValid()) {
        $mime = $file->getMimeType();

        return $this->mimeToType($mime); // Utilisez $this->mimeToType() pour appeler la méthode de la classe
    }

    return '';
}

    function mimeToType(string $mime = null): string
    {
        if ($mime) {
            if (strstr($mime, 'image/')) {
                return 'image';
            } elseif (strstr($mime, 'video/')) {
                return 'video';
            } elseif (strstr($mime, 'audio/')) {
                return 'audio';
            } elseif ($mime == 'application/pdf') {
                return 'pdf';
            }
        }

        return 'file';
    }
    public function rules()
    {
        return [
            'editing.fname' => 'required|min:2',
            'editing.lname' => 'required|min:2',
            'editing.classe' => 'required|min:1',
            'editing.phone' => 'required|min:1',
            'editing.adresse' => 'required|min:1',
            'editing.sexe' => 'required|min:1',
            // 'editing.diplome_imageUrl' => 'required',
            // 'editing.profil_imageUrl' => 'required|min:1',
            'editing.grade' => 'required|min:1',
            'editing.ecole' => 'required|min:1',
            'editing.description' => 'required|min:1',
            'editing.dateLieuNaissance' => 'required|min:1',
            'editing.situationMatrimoniale' => 'required|min:1',
            'editing.niveauEtude' => 'required|min:1',
            'editing.heureDisponibilite' => 'required|min:1',
            // 'editing.identite' => 'required|min:1',
            // 'editing.casierJudiciaire' => 'required|min:1',
            // 'editing.attestationResidence' => 'required|min:1',
            'editing.experience' => 'required|min:1',
            'editing.status' => 'required|min:1',
            'editing.user_id' => 'required',
            'editing.matiere_id' => 'required',
        ];
    }


    public function delete(Repetiteur $repetiteurs)
    {
        $this->deleting = $repetiteurs;
        $this->action = 'Supprimer un Repetiteur';
        $this->showDeleteModal = true;
    }

    public function edit(Repetiteur $repetiteurs)
    {
        $this->editing = $repetiteurs;
        $this->action = 'Modifier un Repetiteur';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Repetiteur();
        $this->action = 'Ajouter un Repetiteur';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé un Repetiteur');
    }

    public function diplome(){

        $this->validate([
            'pdffile' => 'required|max:10240',
        ]);


        $file = $this->pdffile;

        $name = time() . $file->getClientOriginalName();
        $fileType = $this->getFileType($file);
        //dd($fileType);
        $path = '';
        switch ($fileType) {
            case 'image':
                $path = 'images';
                break;
            case 'audio':
                $path = 'audios';
                break;
            case 'video':
                $path = 'videos';
                break;
            case 'pdf':
                $path = 'pdfs';
                break;
            default:
                $path = 'images';
                break;
        }
        $url = $this->file->storePubliclyAs($path, $name, 's3');
        $url = "https://apibackout.s3.us-east-1.amazonaws.com/$url";
       $this->diplomeUrl=$url;
      // dd( $this->diplomeUrl);
        // dd($url);
    }

    public function casierJudiciaire(){

        $this->validate([
            'pdffilecasierJudiciaire' => 'required|max:10240',
        ]);


        $file = $this->pdffilecasierJudiciaire;

        $name = time() . $file->getClientOriginalName();
        $fileType = $this->getFileType($file);
        //dd($fileType);
        $path = '';
        switch ($fileType) {
            case 'image':
                $path = 'images';
                break;
            case 'audio':
                $path = 'audios';
                break;
            case 'video':
                $path = 'videos';
                break;
            case 'pdf':
                $path = 'pdfs';
                break;
            default:
                $path = 'images';
                break;
        }
        $url = $this->file->storePubliclyAs($path, $name, 's3');
        $url = "https://apibackout.s3.us-east-1.amazonaws.com/$url";
       $this->casierJudiciaireUrl=$url;

    }
    public function attestationResidence(){

        $this->validate([
            'pdffileattestationResidence' => 'required|max:10240',
        ]);


        $file = $this->pdffileattestationResidence;

        $name = time() . $file->getClientOriginalName();
        $fileType = $this->getFileType($file);
        //dd($fileType);
        $path = '';
        switch ($fileType) {
            case 'image':
                $path = 'images';
                break;
            case 'audio':
                $path = 'audios';
                break;
            case 'video':
                $path = 'videos';
                break;
            case 'pdf':
                $path = 'pdfs';
                break;
            default:
                $path = 'images';
                break;
        }
        $url = $this->file->storePubliclyAs($path, $name, 's3');
        $url = "https://apibackout.s3.us-east-1.amazonaws.com/$url";
       $this->attestationResidenceUrl=$url;
    }

    public function identite(){

        $this->validate([
            'pdffileidentite' => 'required|max:10240',
        ]);


        $file = $this->pdffileidentite;

        $name = time() . $file->getClientOriginalName();
        $fileType = $this->getFileType($file);
        //dd($fileType);
        $path = '';
        switch ($fileType) {
            case 'image':
                $path = 'images';
                break;
            case 'audio':
                $path = 'audios';
                break;
            case 'video':
                $path = 'videos';
                break;
            case 'pdf':
                $path = 'pdfs';
                break;
            default:
                $path = 'images';
                break;
        }
        $url = $this->file->storePubliclyAs($path, $name, 's3');
        $url = "https://apibackout.s3.us-east-1.amazonaws.com/$url";
       $this->identiteUrl=$url;
      // dd( $this->diplomeUrl);
        // dd($url);
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,video/webm,video/mp4,video/3gpp,audio/mpeg,audio/mp3,audio/wav|max:2048',
        ]);


        $file = $this->file;

        $name = time() . $file->getClientOriginalName();
        $fileType = $this->getFileType($file);
        //dd($fileType);
        $path = '';
        switch ($fileType) {
            case 'image':
                $path = 'images';
                break;
            case 'audio':
                $path = 'audios';
                break;
            case 'video':
                $path = 'videos';
                break;
            case 'pdf':
                $path = 'pdfs';
                break;
            default:
                $path = 'images';
                break;
        }
        $url = $this->file->storePubliclyAs($path, $name, 's3');
        $url = "https://apibackout.s3.us-east-1.amazonaws.com/$url";
        $this->diplome();
        $this->identite();
        $this->casierJudiciaire();
        $this->attestationResidence();
         //dd( $this->diplomeUrl);
       //  dd($this->editing->id);
         if ($this->editing->id) {
            $repetiteur = Repetiteur::find($this->editing->id);
           // dd($this->editing->id);
            if ($repetiteur) {
                $repetiteur->fname = $this->editing->fname;
                $repetiteur->lname = $this->editing->lname;
                $repetiteur->classe = $this->editing->classe;
                $repetiteur->phone = $this->editing->phone;
                $repetiteur->adresse = $this->editing->adresse;
                $repetiteur->sexe = $this->editing->sexe;
                $repetiteur->grade = $this->editing->grade;
                $repetiteur->ecole = $this->editing->ecole;
                $repetiteur->description = $this->editing->description;
                $repetiteur->dateLieuNaissance = $this->editing->dateLieuNaissance;
                $repetiteur->situationMatrimoniale= $this->editing->situationMatrimoniale;
                $repetiteur->niveauEtude = $this->editing->niveauEtude;
                $repetiteur->experience = $this->editing->experience;
                $repetiteur->status = $this->editing->status;
                $repetiteur->heureDisponibilite = $this->editing->heureDisponibilite;
                $repetiteur->user_id = $this->editing->user_id;
                $repetiteur->matiere_id = $this->editing->matiere_id;
                $repetiteur->profil_imageUrl = $url;
                $repetiteur->diplome_imageUrl=$this->diplomeUrl;
                $repetiteur->identite =$this->identiteUrl;
                $repetiteur->casierJudiciaire =$this->casierJudiciaireUrl;
                $repetiteur->attestationResidence =$this->attestationResidenceUrl;
                $repetiteur->save();

                $this->notify('Modification effectuée avec succès');
                $this->showEditModal = false;
            }


         } else {
            Repetiteur::create([
                'fname' => $this->editing->fname,
                'lname' => $this->editing->lname,
                'classe' => $this->editing->classe,
                'phone' => $this->editing->phone,
                'adresse' => $this->editing->adresse,
                'sexe' => $this->editing->sexe,
                'grade' => $this->editing->grade,
                'ecole' => $this->editing->ecole,
                'description' => $this->editing->description,
                'dateLieuNaissance' => $this->editing->dateLieuNaissance,
                'situationMatrimoniale' => $this->editing->situationMatrimoniale,
                'niveauEtude' => $this->editing->niveauEtude,
                'experience' => $this->editing->experience,
                'status' => $this->editing->status,
                'heureDisponibilite' => $this->editing->heureDisponibilite,
                'user_id' => $this->editing->user_id,
                'matiere_id' => $this->editing->matiere_id,
                'profil_imageUrl' => $url,
                'diplome_imageUrl' =>$this->diplomeUrl,
                'identite' =>$this->identiteUrl,
                'casierJudiciaire' =>$this->casierJudiciaireUrl,
                'attestationResidence' =>$this->attestationResidenceUrl,
            ]);
            $this->notify('Enregistrement effectué avec succès');
            $this->showEditModal = false;
        }


    }
    public function notify($message)
    {
        Session::flash('message', $message);
    }

    public function render()
    {

        return view('livewire.show-repetiteurs',[
            'repetiteurs'=> Repetiteur::all(),
            'matiere'=> Matiere::all(),
            'users'=> User::all(),

        ]);
    }

}
