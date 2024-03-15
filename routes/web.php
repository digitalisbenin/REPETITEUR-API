<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowEpreuves;
use App\Http\Livewire\ShowMatieres;
use App\Http\Livewire\ShowRoles;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\ShowPayements;
use App\Http\Livewire\ShowRepetiteurs;
use App\Http\Livewire\ShowPostes;
use App\Http\Livewire\ShowParents;
use App\Http\Livewire\ShowDemande;
use App\Http\Livewire\ShowEnfants;
use App\Http\Livewire\ShowClasses;
use App\Http\Livewire\ShowCommune;
use App\Http\Livewire\ShowDetailsRepetiteur;
use App\Http\Livewire\ShowEcole;
use App\Http\Livewire\ShowEvaluation;
use App\Http\Livewire\ShowLibrairie;
use App\Http\Livewire\ShowMessage;
use App\Http\Livewire\ShowPublicites;
use App\Http\Livewire\ShowRepetiteurMatiereClasses;
use App\Http\Livewire\ShowTarifications;
use App\Models\Repetiteur;
use App\Models\Enfants;
use App\Models\Demande;
use App\Models\Ecole;
use App\Models\Librairie;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'isAdmin'

])->group(function () {
    Route::get('/dashboard', function () {
        $repetiteur= \App\Models\Repetiteur::all();
        $enfants= \App\Models\Enfants::all();
        $demande= \App\Models\Demande::all();
        $ecole= \App\Models\Ecole::all();
        $librairie= \App\Models\Librairie::all();
        return view('dashboard',compact('repetiteur','enfants','demande','ecole','librairie'));
    })->name('dashboard');
    Route::get('/show-demandes', ShowDemande::class)->name('show-demandes');
    Route::get('/show-enfants', ShowEnfants::class)->name('show-enfants');
    Route::get('/show-evaluations', ShowEvaluation::class)->name('show-evaluations');
    Route::get('/show-classes', ShowClasses::class)->name('show-classes');
    Route::get('/show-commune', ShowCommune::class)->name('show-commune');
    Route::get('/show-message', ShowMessage::class)->name('show-message');
    Route::get('/show-ecoles', ShowEcole::class)->name('show-ecoles');
    Route::get('/show-librairies', ShowLibrairie::class)->name('show-librairies');
    Route::get('/show-tarifications', ShowTarifications::class)->name('show-tarifications');
    Route::get('/show-repetiteur-matiere-classes', ShowRepetiteurMatiereClasses::class)->name('show-repetiteur-matiere-classes');
    Route::get('/show-epreuves', ShowEpreuves::class)->name('show-epreuves');
    Route::get('/show-matieres', ShowMatieres::class)->name('show-matieres');
    Route::get('/show-roles', ShowRoles::class)->name('show-roles');
    Route::get('/show-users', ShowUsers::class)->name('show-users');
    Route::get('/show-payements', ShowPayements::class)->name('show-payements');
    Route::get('/show-postes', ShowPostes::class)->name('show-postes');
    Route::get('/show-parents', ShowParents::class)->name('show-parents');
    Route::get('/show-publicites', ShowPublicites::class)->name('show-publicites');
    Route::get('/show-repetiteurs', ShowRepetiteurs::class)->name('show-repetiteurs');
    Route::get('/show-details-repetiteur/{id}', ShowDetailsRepetiteur::class)->name('show-details-repetiteur');


});
