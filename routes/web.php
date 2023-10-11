<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowEnfants;
use App\Http\Livewire\ShowEpreuves;
use App\Http\Livewire\ShowMatieres;
use App\Http\Livewire\ShowRoles;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\ShowPayements;
use App\Http\Livewire\ShowRepetiteurs;
use App\Http\Livewire\ShowPostes;
use App\Http\Livewire\ShowParents;

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
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/show-enfants', ShowEnfants::class)->name('show-enfants');
    Route::get('/show-epreuves', ShowEpreuves::class)->name('show-epreuves');
    Route::get('/show-matieres', ShowMatieres::class)->name('show-matieres');
    Route::get('/show-roles', ShowRoles::class)->name('show-roles');
    Route::get('/show-users', ShowUsers::class)->name('show-users');
    Route::get('/show-payements', ShowPayements::class)->name('show-payements');
    Route::get('/show-postes', ShowPostes::class)->name('show-postes');
    Route::get('/show-parents', ShowParents::class)->name('show-parents');
    Route::get('/show-repetiteurs', ShowRepetiteurs::class)->name('show-repetiteurs');
});
