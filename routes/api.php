<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Auth\VerificationController;
use App\Http\Controllers\Api\V1\Auth\ForgotPasswordController;

use App\Http\Controllers\Api\V1\EpreuveController;
use App\Http\Controllers\Api\V1\EnfantsController;
use App\Http\Controllers\Api\V1\MatiereController;
use App\Http\Controllers\Api\V1\ParentsController;
use App\Http\Controllers\Api\V1\PayementController;
use App\Http\Controllers\Api\V1\PosteController;
use App\Http\Controllers\Api\V1\RepetiteurController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('json-response')->prefix('auth')->group(function () {
    // route to register new user for the platform
    Route::post("/register", [AuthController::class, 'register'])->name('api.register');
    // route to log the user if he has already sign up
    Route::post("/login", [AuthController::class, 'login'])->name('api.login');
    // route to send reset link to email for password forgotten
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    // route to send reset password for password forgotten
    Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('passwords.reset');
    // route to resend the email verification when the link has expired
    Route::post('resend/', [VerificationController::class, 'resend'])->name('verification.resend');
    // route to verify email after clicking on the link on email
    Route::get('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify')
        ->middleware('signed');
});

// route pour epreuves
Route::get('/epreuves' ,[EpreuveController::class, 'index']);
Route::get('/epreuves/{id}', [EpreuveController::class, 'show']);
Route::post('/epreuves', [EpreuveController::class, 'store']);
Route::put('/epreuves/{id}', [EpreuveController::class, 'update']);
Route::delete('/epreuves/{id}',[EpreuveController::class, 'destroy']);

// route pour enfants
Route::get('/enfants' ,[EnfantsController::class, 'index']);
Route::get('/enfants/{id}', [EnfantsController::class, 'show']);
Route::post('/enfants', [EnfantsController::class, 'store']);
Route::put('/enfants/{id}', [EnfantsController::class, 'update']);
Route::delete('/enfants/{id}',[EnfantsController::class, 'destroy']);
//route pour matiere
Route::get('/matieres' ,[MatiereController::class, 'index']);
Route::get('/matieres/{id}', [MatiereController::class, 'show']);
Route::post('/matieres', [MatiereController::class, 'store']);
Route::put('/matieres/{id}', [MatiereController::class, 'update']);
Route::delete('/matieres/{id}',[MatiereController::class, 'destroy']);

//route pour payement
Route::get('/payements' ,[PayementController::class, 'index']);
Route::get('/payements/{id}', [PayementController::class, 'show']);
Route::post('/payements', [PayementController::class, 'store']);
Route::put('/payements/{id}', [PayementController::class, 'update']);
Route::delete('/payements/{id}',[PayementController::class, 'destroy']);

// route pour les User
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
//route pour les roles
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/roles/{id}', [RoleController::class, 'show']);
Route::post('/roles', [RoleController::class, 'store']);
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
// route pour les postes
Route::get('/postes', [PosteController::class, 'index']);
Route::get('/postes/{id}', [PosteController::class, 'show']);
Route::post('/postes', [PosteController::class, 'store']);
Route::put('/postes/{id}', [PosteController::class, 'update']);
Route::delete('/postes/{id}', [PosteController::class, 'destroy']);



//route pour les parents
Route::get('/parents', [ParentsController::class, 'index']);
Route::get('/parents/{id}', [ParentsController::class, 'show']);
//route pour repetiteur
Route::get('/repetiteurs', [RepetiteurController::class, 'index']);
Route::get('/repetiteurs/{id}', [RepetiteurController::class, 'show']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware(['auth:sanctum', 'json-response'])->group(function () {
    Route::get("logout", [AuthController::class, 'logout']);

    Route::post('/parents', [ParentsController::class, 'store']);
    Route::put('/parents/{id}', [ParentsController::class, 'update']);
    Route::delete('/parents/{id}', [ParentsController::class, 'destroy']);
    Route::post('/repetiteurs', [RepetiteurController::class, 'store']);
    Route::put('/repetiteurs/{id}', [RepetiteurController::class, 'update']);
    Route::delete('/repetiteurs/{id}', [RepetiteurController::class, 'destroy']);

});
