<?php


use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FraisScolariteController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\DashboardController;



use Illuminate\Support\Facades\Route;

Route::post('/set-classe', [ClasseController::class, 'setClasse'])->name('set-classe');

Route::post('/set-annee-scolaire', [AnneeScolaireController::class, 'setAnneeScolaire'])->name('set-annee-scolaire');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('annee_scolaires', AnneeScolaireController::class);
Route::resource('classes', ClasseController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('matieres', MatiereController::class);
Route::resource('notes', NoteController::class);
Route::resource('frais_scolarites', FraisScolariteController::class);
Route::resource('paiements', PaiementController::class);
