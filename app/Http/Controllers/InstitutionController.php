<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;

class InstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::all();
        return view('layouts.listInstitutions', compact('institutions'));
    }

    public function create()
    {
        return view('layouts.createInstitutions');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:institutions,code_institution|max:255',
            'nom' => 'required|max:255',
        ]);

        $institution = new Institution();
        $institution->code_institution = $request->input('code');
        $institution->nom_institution = $request->input('nom');

        $institution->save();

        return redirect()->route('institutions.index')->with('success', 'Institution créée avec succès !');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|unique:institutions,code_institution,' . $id . '|max:255',
            'nom' => 'required|max:255',
        ]);

        $institution = Institution::findOrFail($id);
        $institution->code_institution = $request->input('code');
        $institution->nom_institution = $request->input('nom');

        $institution->save();

        return redirect()->route('institutions.index')->with('success', 'Institution mise à jour avec succès !');
    }
    public function edit($id)
{
    $institution = Institution::findOrFail($id);
    return view('layouts.editInstitution', compact('institution'));
}

public function destroy($id)
{
    $institution = Institution::findOrFail($id);
    $institution->delete();

    return redirect()->route('institutions.index')->with('success', 'Institution supprimée avec succès !');
}

    //
}
