<?php

namespace App\Http\Controllers;

use App\Mail\SeanceNotification;
use Illuminate\Http\Request;
use App\Models\seance;
use App\Models\Participant;
use Illuminate\Support\Facades\Mail;
use App\Models\Lieu;



class SeanceController extends Controller
{
    //
    public function list_seance(Request $request)
    {
        $seances = Seance::all(); // Récupère toutes les séances
        $search = $request->input('search');
        
        if ($search) {
            $seances = Seance::where('Titre', 'like', "%{$search}%")
                             ->orWhere('Description', 'like', "%{$search}%")
                             ->orWhere('Date', 'like', "%{$search}%")
                             ->orWhere('Heure_debut', 'like', "%{$search}%")
                             ->orWhere('Heure_fin', 'like', "%{$search}%")
                             ->get();
        } else {
            $seances = Seance::all();
        }

    return view('layouts.listseance', compact('seances'));
    }

    public function edit($id)
{
    $seance = Seance::findOrFail($id); // Trouver la séance par ID
    return view('layouts.editseance', compact('seance'));
}


    public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'type' => 'required',
            'date' => 'required|date',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i',
            'lien_seance' => 'nullable|url',
        ]);

        // Créer une nouvelle séance
    $seance = new seance();
    $seance->Titre = $request->input('titre');
    $seance->Description = $request->input('description');
    $seance->Type = $request->input('type');
    $seance->Date = $request->input('date');
    $seance->Heure_debut = $request->input('heure_debut');
    $seance->Heure_fin = $request->input('heure_fin');
    $seance->Lien_seance = $request->input('lien_seance');

    // Sauvegarder dans la base de données
    $seance->save();

    // Rediriger vers la page des détails de la séance
    return redirect()->route('seances.show', $seance->id)
                     ->with('success', 'Séance créée avec succès !');

    }

    
    public function update(Request $request, $id)
{
    // Valider les données
    $validated = $request->validate([
        'titre' => 'required|max:255',
        'description' => 'required',
        'type' => 'required',
        'date' => 'required|date',
        'heure_debut' => 'required|date_format:H:i',
        'heure_fin' => 'required|date_format:H:i',
        'lien_seance' => 'nullable|url',
    ]);

    // Trouver la séance par ID
    $seance = Seance::findOrFail($id);
    $seance->Titre = $request->input('titre');
    $seance->Description = $request->input('description');
    $seance->Type = $request->input('type');
    $seance->Date = $request->input('date');
    $seance->Heure_debut = $request->input('heure_debut');
    $seance->Heure_fin = $request->input('heure_fin');
    $seance->Lien_seance = $request->input('lien_seance');

    // Sauvegarder les modifications
    $seance->save();

    // Rediriger avec un message de succès
    return redirect()->route('seances.list')->with('success', 'Séance mise à jour avec succès !');
}

public function destroy($id)
{
    // Trouver la séance par ID
    $seance = Seance::findOrFail($id);

    // Supprimer la séance
    $seance->delete();

    // Rediriger avec un message de succès
    return redirect()->route('seances.list')->with('success', 'Séance supprimée avec succès !');
}

public function show($id)
{
    $seance = Seance::with('participants')->findOrFail($id);

    // Récupérer les IDs des participants déjà ajoutés à cette séance
    $participantsAjoutesIds = $seance->participants->pluck('id')->toArray();

    // Récupérer tous les participants disponibles
    $participants = Participant::all();

    return view('layouts.showseance', compact('seance', 'participants', 'participantsAjoutesIds'));
}





public function addParticipants(Request $request, $seanceId)
{
    $seance = Seance::findOrFail($seanceId);
    $nouveauxParticipants = $request->input('participants', []);
    
    // Récupérer les participants déjà ajoutés
    $participantsActuels = $seance->participants->pluck('id')->toArray();
    
    // Trouver les nouveaux participants à ajouter
    $participantsAajouter = array_diff($nouveauxParticipants, $participantsActuels);
    
    // Ajouter les nouveaux participants
    foreach ($participantsAajouter as $participantId) {
        $seance->participants()->attach($participantId);
        // Envoyer l'e-mail seulement aux nouveaux participants
        $participant = Participant::find($participantId);
        // Envoyer un e-mail au participant
         Mail::to($participant->Email_participant)->send(new SeanceNotification($seance));
    }

    return redirect()->route('seances.laseance', $seanceId)
        ->with('success', 'Les participants ont été ajoutés avec succès.');
}


public function laseance($id)
{
    $seance = Seance::findOrFail($id);
    $participantsAjoutes = $seance->participants; // Récupère les participants associés à la séance

    return view('layouts.laseance', compact('seance', 'participantsAjoutes'));
}


public function removeParticipant($seanceId, $participantId)
{
    // Trouver la séance
    $seance = Seance::find($seanceId);

    // Vérifier si la séance existe
    if (!$seance) {
        return redirect()->route('seances.index')->with('error', 'Séance non trouvée');
    }

    // Retirer le participant de la séance
    $seance->participants()->detach($participantId);

    // Rediriger avec un message de succès
    return redirect()->route('seances.laseance', $seanceId)->with('success', 'Participant retiré avec succès');
}

}
