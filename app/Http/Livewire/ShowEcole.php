<?php

namespace App\Http\Livewire;

use App\Models\Ecole;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Session;

class ShowEcole extends Component
{

    use WithFileUploads;
    public Ecole $deleting;
    public Ecole $editing;
    public $showDeleteModal = false;
    public $showEditModal = false;
    public $action = '';
    public $search;
    public $file;


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
    public function notify($message)
    {
        Session::flash('message', $message);
    }

    public function rules()
    {
        return [
            'editing.name' => 'required|min:2',
            'editing.description' => 'required|min:2',
            'editing.resultat' => 'required|min:2',
            'editing.ecoleUrl' => 'required|min:2',
        ];
    }

    public function delete(Ecole $ecole)
    {
        $this->deleting = $ecole;
        $this->action = 'Supprimer une école';
        $this->showDeleteModal = true;
    }

    public function edit(Ecole $ecole)
    {
        $this->editing = $ecole;
        $this->action = 'Modifier une école';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Ecole();
        $this->action = 'Ajouter une école';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une école');
    }

    public function save()
    {

        $this->validate([
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,video/webm,video/mp4,video/3gpp,audio/mpeg,audio/mp3,audio/wav|max:2048',
            'editing.name' => 'required|min:2',
            'editing.description' => 'required|min:2',
            'editing.resultat' => 'required|min:2',
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
        if ($this->editing->id) {
            $ecole = Ecole::find($this->editing->id);
           // dd($this->editing->id);
            if ($ecole) {
                $ecole->name = $this->editing->name;
                $ecole->description = $this->editing->description;
                $ecole->resultat = $this->editing->resultat;
                $ecole->ecoleUrl = $url;
                $ecole->save();
                $this->notify('Modification effectuée avec succès');
                $this->showEditModal = false;
            }


         } else {
            Ecole::create([
                'name' => $this->editing->name,
                'description' => $this->editing->description,
                'resultat' => $this->editing->resultat,
                'ecoleUrl' => $url,
            ]);
            $this->notify('Enregistrement effectué avec succès');
            $this->showEditModal = false;
        }
    }

    public function render()
    {
        $ecoles = Ecole::latest('updated_at')->get();
        return view('livewire.show-ecole', [
            'ecole' => $ecoles,


        ]);
    }


}
