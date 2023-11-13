<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Repetiteur\StoreRepetiteurRequest;
use App\Http\Requests\Repetiteur\UpdateRepetiteurRequest;
use App\Http\Resources\Repetiteur\RepetiteurCollection;
use App\Http\Resources\Repetiteur\RepetiteurResource;
use App\Models\Matiere;
use App\Models\Repetiteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class RepetiteurController extends ApiController
{


    public function getFileType(UploadedFile $file): string
    {
        if ($file && $file->isValid()) {
            $mime = $file->getMimeType();
            return $this->mimeToType($mime);
        }

        return '';
    }

    public function mimeToType(string $mime = null): string
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
    public function setFilePath(string $fileType, string $name): string
    {
            $path = '';
            switch ($fileType) {
                case 'image':
                    $path = 'images/' . $name;
                    break;
                case 'audio':
                    $path = 'audios/' . $name;
                    break;
                case 'video':
                    $path = 'videos/' . $name;
                    break;
                case 'pdf':
                    $path = 'pdfs/' . $name;
                    break;
                default:
                    $path = 'images/' . $name;
                    break;
            }
            return $path;
        }
           /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RepetiteurCollection(Repetiteur::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreRepetiteurRequest $request)
    // {
    //     $repetiteurs = new Repetiteur();
    //     if($request->hasFile('file')){
    //         $file =$request->file('file');
    //        // dd($file);
    //         $ext=$file->getClientOriginalExtension();
    //         $filename = time().'.'.$ext;
    //        // $file->storeAs('uploads', $filename, 'public');
    //         $file->move('assets/uploads/repetiteur',$filename);
    //         $repetiteurs->diplome_imageUrl= $filename;
    //         $repetiteurs->profil_imageUrl= $filename;
    //          $repetiteurs = Repetiteur::create([
    //             'fname' => $request->fname,
    //             'lname' => $request->lname,
    //             'classe' => $request->classe,
    //             'sexe' => $request->sexe,
    //             'ecole' => $request->ecole,
    //             'grade' => $request->grade,
    //             'phone' => $request->phone,
    //             'adresse' => $request->adresse,
    //             'experience' => $request->experience,
    //             'matiere_id' => $request->matiere_id,
    //             'user_id' => $request->user_id,
    //         ]);
    //         return new RepetiteurResource($repetiteurs);
    //     }


    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Image Invalide',
    //     ]);
    // }

    public function store(StoreRepetiteurRequest $request)

    {
        $repetiteurs = Repetiteur::create($request->all());

        return new RepetiteurResource($repetiteurs);

}
    /**
     * Display the specified resource.
     */
    public function show( $id)
    {         $repetiteurs = Repetiteur::find($id);
        return new RepetiteurResource($repetiteurs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepetiteurRequest $request, $id)
    {
        $repetiteurs = Repetiteur::find($id);
        $repetiteurs->update($request->all());

        return new RepetiteurResource($repetiteurs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {    $repetiteurs = Repetiteur::find($id);
        $repetiteurs->delete();

        return response(null, 204);
    }
}
