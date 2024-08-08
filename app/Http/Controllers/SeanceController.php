<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\seance;

class SeanceController extends Controller
{
    //
    public function list_seance()
    {
        $seances = Seance::all(); // Récupère toutes les séances
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

        // Rediriger vers la liste des séances avec un message de succès
        return redirect()->route('seances.list')->with('success', 'Séance créée avec succès !');

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
    $seance = Seance::findOrFail($id);
    return view('layouts.showseance', compact('seance'));
}


}
