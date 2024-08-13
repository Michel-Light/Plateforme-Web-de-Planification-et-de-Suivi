<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Direction;

class ParticipantController extends Controller
{
    public function list_participant()
    {
        // Récupère tous les participants avec leurs directions associées
        $participants = Participant::with('direction')->get();
        return view('layouts.listParticipants', compact('participants'));
    }
    

    public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|unique:participants,Email_participant',
            'poste' => 'required|max:255',
            'telephone' => 'required|max:15',
            'mot_de_passe' => 'required|min:8',
            'direction_id' => 'required|exists:directions,id',
        ]);
    
        // Créer un nouveau participant
        $participant = new Participant();
        $participant->Nom_participant = $request->input('nom');
        $participant->Prenom_participant = $request->input('prenom');
        $participant->Email_participant = $request->input('email');
        $participant->Poste_participant = $request->input('poste');
        $participant->Telephone_participant = $request->input('telephone');
        $participant->Mot_de_passe = bcrypt($request->input('mot_de_passe'));
        $participant->direction_id = $request->input('direction_id'); // Associer la direction
    
        // Sauvegarder dans la base de données
        $participant->save();
    
        // Rediriger vers la liste des participants avec un message de succès
        return redirect()->route('participants.list')->with('success', 'Participant créé avec succès !');
    }
    

    public function update(Request $request, $id)
    {
        // Valider les données
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|unique:participants,Email_participant,' . $id,
            'poste' => 'required|max:255',
            'telephone' => 'required|max:15',
            'mot_de_passe' => 'nullable|min:8',
        ]);

        // Trouver le participant par ID
        $participant = Participant::findOrFail($id);
        $participant->Nom_participant = $request->input('nom');
        $participant->Prenom_participant = $request->input('prenom');
        $participant->Email_participant = $request->input('email');
        $participant->Poste_participant = $request->input('poste');
        $participant->Telephone_participant = $request->input('telephone');

        // Si un nouveau mot de passe est fourni, le hacher et le mettre à jour
        if ($request->filled('mot_de_passe')) {
            $participant->Mot_de_passe = bcrypt($request->input('mot_de_passe'));
        }

        // Sauvegarder les modifications
        $participant->save();

        // Rediriger avec un message de succès
        return redirect()->route('participants.list')->with('success', 'Participant mis à jour avec succès !');
    }

    public function destroy($id)
    {
        // Trouver le participant par ID
        $participant = Participant::findOrFail($id);

        // Supprimer le participant
        $participant->delete();

        // Rediriger avec un message de succès
        return redirect()->route('participants.list')->with('success', 'Participant supprimé avec succès !');
    }

    public function create()
    {
        $directions = Direction::all(); // Récupère toutes les directions
        return view('layouts.createParticipants', compact('directions')); // Passe les directions à la vue
    }
    
}
