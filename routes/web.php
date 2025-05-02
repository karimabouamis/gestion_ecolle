<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddlware;
use App\Http\Middleware\RoleMiddlware;

/*---------------Dashboard----------------*/


Route::middleware(AuthMiddlware::class)->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout',[UserController::class,'logout'])->name("authlogout");


Route::middleware(RoleMiddlware::class.':admin,enseignant')->group(function () {
Route::resource('eleve', EleveController::class); 
Route::resource('matieres', MatiereController::class);
Route::resource('classe',ClasseController::class);
Route::resource('salles', SalleController::class);
Route::resource('evaluations', EvaluationController::class);
});



Route::middleware(RoleMiddlware::class.':admin')->group(function () {
Route::resource('enseignant', EnseignantController::class);
Route::resource('niveaux', NiveauController::class);
Route::get('/scolaires/index',[AnneeScolaireController::class,'index'])->name("scolaires.index");
Route::get('/scolaires/create',[AnneeScolaireController::class,'create'])->name('scolaires.create');
Route::post('/scolaires/store',[AnneeScolaireController::class,'store'])->name('scolaires.store');
Route::get('/scolaires/edit/{annee_scolaire}',[AnneeScolaireController::class,'edit'])->name('scolaires.edit');
Route::put('/scolaires/{annee_scolaire}', [AnneeScolaireController::class, 'update'])->name('scolaires.update');
Route::delete('annee_scolaires/{annee_scolaire}', [AnneeScolaireController::class, 'remove'])->name('scolaires.remove');

});
Route::middleware(RoleMiddlware::class.':eleve')->group(function(){
    Route::get('/mes-evaluations', [EvaluationController::class, 'mesEvaluations'])->name('eleve.evaluations');
        Route::get('/mes-notes', [NoteController::class, 'mesNotes'])->name('eleve.notes');


})






;


//------------------login-----------/

Route::get('/login',[UserController::class,'login'])->name('auth.login');
Route::get('/register',[UserController::class,'register'])->name('auth.register');


Route::post('/form/login',[UserController::class,'loginform'])->name('auth.formlogin');
Route::post('/form/register',[UserController::class,'registerform'])->name('auth.formregister');


