<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\ParticipantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/form.html', function () {
    return view('layouts.seance');
});


Route::get('/Accueil.html', function () {
    return view('layouts.index');
});


Route::get('/general_elements.html', function () {
    return view('layouts.createParticipants');
});


Route::get('/seances/{id}', [SeanceController::class, 'show'])->name('seances.show');

Route::get('/listseance.html' ,[SeanceController::class, 'list_seance'])->name('seances.list');

Route::post('/seances', [SeanceController::class, 'store'])->name('seances.store');

Route::get('/media_gallery.html', [ParticipantController::class, 'list_participant'])->name('participants.list');


Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');




//Route::get('/seances/{id}/edit', [SeanceController::class, 'edit'])->name('seances.edit');

//Route::delete('/seances/{id}', [SeanceController::class, 'destroy'])->name('seances.destroy');


Route::put('/seances/{id}', [SeanceController::class, 'update'])->name('seances.update');

// Routes Institutions

Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions.index');

Route::get('/create', [InstitutionController::class, 'create'])->name('institutions.create');

Route::post('/institutions', [InstitutionController::class, 'store'])->name('institutions.store');

Route::get('/institutions/{id}/edit', [InstitutionController::class, 'edit'])->name('institutions.edit');

Route::delete('/institutions/{id}', [InstitutionController::class, 'destroy'])->name('institutions.destroy');


// Routes Directions


Route::get('/directions', [DirectionController::class, 'create'])->name('directions.create');

Route::get('/directions/create', [DirectionController::class, 'create'])->name('directions.create');

Route::post('/directions', [DirectionController::class,'store'])->name('directions.store');

Route::get('/directions/{id}/edit', [DirectionController::class, 'edit'])->name('directions.edit');

