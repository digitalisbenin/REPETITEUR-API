<?php

namespace App\Http\Livewire;


use App\Models\Publicite ;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Session;

class ShowPublicites extends Component
{
    use WithFileUploads;
    public Publicite $deleting;
    public Publicite $editing;
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
            'editing.titre' => 'required|min:2',
            'editing.publiciteUrl' => 'required|min:2',
        ];
    }

    public function delete(Publicite $publicite)
    {
        $this->deleting = $publicite;
        $this->action = 'Supprimer une publicité';
        $this->showDeleteModal = true;
    }

    public function edit(Publicite $publicite)
    {
        $this->editing = $publicite;
        $this->action = 'Modifier une publicité';
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editing = new Publicite();
        $this->action = 'Ajouter une publicité';
        $this->showEditModal = true;
    }
    public function deleteSelected()
    {
        $this->deleting->delete();

        $this->showDeleteModal = false;

        $this->notify('Vous avez supprimé une publicité');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,video/webm,video/mp4,video/3gpp,audio/mpeg,audio/mp3,audio/wav|max:2048',
            'editing.titre' => 'required|min:2',
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
            $publicite = Publicite::find($this->editing->id);
           // dd($this->editing->id);
            if ($publicite) {
                $publicite->titre = $this->editing->titre;
                $publicite->publiciteUrl = $url;
                $publicite->save();
                $this->notify('Modification effectuée avec succès');
                $this->showEditModal = false;
            }


         } else {
            Publicite::create([
                'titre' => $this->editing->titre,
            'publiciteUrl' => $url,
            ]);
            $this->notify('Enregistrement effectué avec succès');
            $this->showEditModal = false;
        }
    }

    public function render()
    {
        $publicites = Publicite::latest('updated_at')->get();
        return view('livewire.show-publicites', [
            'publicite' => $publicites,


        ]);
    }

}
