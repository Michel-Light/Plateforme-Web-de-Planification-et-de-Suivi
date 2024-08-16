<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompteOrganisateurs;

class CompteOrganisateursController extends Controller
{

    public function index(Request $request)
    {
        $query = CompteOrganisateurs::query();

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('Nom', 'LIKE', "%{$search}%")
                  ->orWhere('Prenom', 'LIKE', "%{$search}%")
                  ->orWhere('Email', 'LIKE', "%{$search}%")
                  ->orWhere('Poste', 'LIKE', "%{$search}%");
        }

        $compteOrganisateurs = $query->get();

        return view('layouts.listOrganisateurs', compact('compteOrganisateurs'));
    }
    public function create()
    {
        return view('layouts.createOrganisateurs');
    }

    /**
     * Stocker un nouveau compte organisateur dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:compte_organisateurs',
            'mot_de_passe' => 'required|string|min:8',
            'Poste' => 'required|string|max:255',
        ]);

        CompteOrganisateurs::create([
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'Email' => $request->input('Email'),
            'mot_de_passe' => $request->input('mot_de_passe'),
            'Poste' => $request->input('Poste'),
        ]);

        return redirect()->route('compteOrganisateurs.index')->with('success', 'Compte organisateur créé avec succès.');
    }

    public function destroy($id)
    {
        $compteOrganisateur = CompteOrganisateurs::findOrFail($id);
        $compteOrganisateur->delete();

        return redirect()->route('compteOrganisateurs.index')->with('success', 'Compte organisateur supprimé avec succès.');
    }

    public function edit($id)
    {
        $compteOrganisateurs = CompteOrganisateurs::findOrFail($id);
        return view('layouts.editOrganisateurs', compact('compteOrganisateurs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:compte_organisateurs,Email,' . $id,
            'mot_de_passe' => 'nullable|string|min:8',
            'Poste' => 'required|string|max:255',
        ]);

        $compteOrganisateurs = CompteOrganisateurs::findOrFail($id);

        $compteOrganisateurs->update([
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'Email' => $request->input('Email'),
            'mot_de_passe' => $request->filled('mot_de_passe') ? bcrypt($request->input('mot_de_passe')) : $compteOrganisateurs->mot_de_passe,
            'Poste' => $request->input('Poste'),
        ]);

        return redirect()->route('compteOrganisateurs.index')->with('success', 'Compte organisateur mis à jour avec succès.');
    }
}
