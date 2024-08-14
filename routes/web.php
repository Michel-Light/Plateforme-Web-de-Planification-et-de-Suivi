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



Route::get('/listseance.html' ,[SeanceController::class, 'list_seance'])->name('seances.list');

Route::post('/seances', [SeanceController::class, 'store'])->name('seances.store');

Route::get('seances/show/{id}', [SeanceController::class, 'show'])->name('seances.show');
Route::post('seances/add_participants/{id}', [SeanceController::class, 'addParticipants'])->name('seance.add_participants');
Route::get('seances/laseance/{id}', [SeanceController::class, 'laseance'])->name('seances.laseance');
Route::delete('seances/remove_participant/{seanceId}/{participantId}', [SeanceController::class, 'removeParticipant'])->name('seance.remove_participant');

Route::post('/seances/{id}/send_notification', [SeanceController::class, 'sendNotification'])->name('seances.send_notification');



//Route::get('/seances/{id}/edit', [SeanceController::class, 'edit'])->name('seances.edit');

//Route::delete('/seances/{id}', [SeanceController::class, 'destroy'])->name('seances.destroy');


Route::put('/seances/{id}', [SeanceController::class, 'update'])->name('seances.update');

// Routes Institutions

Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions.index');

Route::get('/create', [InstitutionController::class, 'create'])->name('institutions.create');

Route::post('/institutions', [InstitutionController::class, 'store'])->name('institutions.store');

Route::get('/institutions/{id}/edit', [InstitutionController::class, 'edit'])->name('institutions.edit');

Route::delete('/institutions/{id}', [InstitutionController::class, 'destroy'])->name('institutions.destroy');

Route::resource('institutions', InstitutionController::class);



// Routes Directions


Route::get('/directions', [DirectionController::class, 'create'])->name('directions.create');

Route::get('/directions/create', [DirectionController::class, 'create'])->name('directions.create');

Route::post('/directions', [DirectionController::class,'store'])->name('directions.store');

Route::get('/directions/{id}/edit', [DirectionController::class, 'edit'])->name('directions.edit');

Route::get('direction', [DirectionController::class, 'index'])->name('directions.index');

Route::delete('/directions/{id}', [DirectionController::class, 'destroy'])->name('directions.destroy');

Route::put('/directions/{id}', [DirectionController::class, 'update'])->name('directions.update');


// Routes Participants

Route::get('/general_elements.html', [ParticipantController::class, 'create'])->name('participants.create');

Route::get('/media_gallery.html', [ParticipantController::class, 'list_participant'])->name('participants.list');

Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');

Route::post('/lieu/store', [LieuController::class, 'store'])->name('lieu.store');



