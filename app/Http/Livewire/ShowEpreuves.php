<?php

namespace App\Http\Livewire;

use App\Models\Epreuve;
use App\Models\Matiere;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Session;
class ShowEpreuves extends Component
{

    use WithFileUploads;
    public Epreuve $deleting;
    public Epreuve $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;
    public $file;
    public $pdffile;
    public $corrigesURL;


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
            'editing.name' => 'required|min:2',
           // 'editing.epreuve' => 'required|min:2',
            'editing.classe' => 'required|min:1',
           // 'editing.corrige' => 'required|min:1',
            'editing.matiere_id' => 'required',
        ];
    }


    public function delete(Epreuve $epreuves)
    {
        $this->deleting = $epreuves;
        $this->action = 'Supprimer une Epreuve';
        $this->showDeleteModal = true;
    }

    public function edit(Epreuve $epreuves)
    {
        $this->editing = $epreuves;
        $this->action = 'Modifier une Epreuve';
        $this->showEditModal = true;
    }
    public function create()
    {
        $this->editing = new Epreuve();
        $this->action = 'Ajouter une Epreuve';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une Epreuve');
    }

    public function corriges(){

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
        $url = "https://apibackout.s3.amazonaws.com/$url";
       $this->corrigesURL=$url;
      // dd( $this->diplomeUrl);
        // dd($url);
    }

    public function save()
    {
        // $this->validate();
        // $this->editing->save();
        // $this->notify('Enregistrement effectué avec succès');
        // $this->showEditModal = false;
        $this->validate([
            'file' => 'required|max:10240',
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
        $url = "https://apibackout.s3.amazonaws.com/$url";
        $this->corriges();

         //dd( $this->diplomeUrl);
       //  dd($this->editing->id);
         if ($this->editing->id) {
            $epreuve = Epreuve::find($this->editing->id);
           // dd($this->editing->id);
            if ($epreuve) {
                $epreuve->name = $this->editing->name;

                $epreuve->classe = $this->editing->classe;

                $epreuve->matiere_id = $this->editing->matiere_id;
                $epreuve->epreuve = $url;
                $epreuve->corrige=$this->corrigesURL;

                $epreuve->save();

                $this->notify('Modification effectuée avec succès');
                $this->showEditModal = false;
            }


         } else {
            Epreuve::create([
                'name' => $this->editing->name,
                'classe' => $this->editing->classe,
                'matiere_id' => $this->editing->matiere_id,
                'epreuve' => $url,
                'corrige' =>$this->corrigesURL,
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

        return view('livewire.show-epreuves',[
            'epreuves'=> Epreuve::all(),
            'matiere'=> Matiere::all(),

        ]);
    }


}
