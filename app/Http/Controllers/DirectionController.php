<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{


    public function index()
    {
        // Récupère toutes les directions avec leurs institutions associées
        $directions = Direction::with('institution')->get();
        return view('layouts.listDirections', compact('directions'));
    }
    public function create()
{
    $institutions = Institution::all(); // Récupère toutes les institutions
    return view('layouts.createDirections', compact('institutions'));
}

public function store(Request $request)
{
    $request->validate([
        'code_direction' => 'required',
        'nom_direction' => 'required',
        'institution_id' => 'required|exists:institutions,id',
    ]);

   
    $direction = new Direction();
        $direction->Code_direction = $request->input('code_direction');
        $direction->Nom_direction = $request->input('nom_direction');
        $direction->Institution_id = $request->input('institution_id');

        $direction->save();

        return redirect()->route('directions.index')->with('success', 'Direction créée avec succès !');
    }

    public function edit($id)
    {
        $direction = Direction::findOrFail($id);
        $institutions = Institution::all(); // Récupère toutes les institutions pour le menu déroulant
        return view('layouts.editDirection', compact('direction', 'institutions'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code_direction' => 'required|unique:directions,code_direction,' . $id . '|max:255',
            'nom_direction' => 'required|max:255',
            'institution_id' => 'required|exists:institutions,id',
        ]);

        $direction = Direction::findOrFail($id);
        $direction->Code_direction = $request->input('code_direction');
        $direction->Nom_direction = $request->input('nom_direction');
        $direction->Institution_id = $request->input('institution_id');

        $direction->save();

        return redirect()->route('directions.index')->with('success', 'Direction mise à jour avec succès !');
    }

    public function destroy($id)
    {
        $direction = Direction::findOrFail($id);
        $direction->delete();

        return redirect()->route('directions.index')->with('success', 'Direction supprimée avec succès !');
    }
}




    

