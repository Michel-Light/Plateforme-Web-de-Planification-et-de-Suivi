<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;

class LieuController extends Controller
{
   // LieuController.php

   public function store(Request $request)
   {
       // Validation des données
       $validatedData = $request->validate([
           'Code_lieu' => 'required|string|max:255',
           'Libelle_lieu' => 'required|string|max:255',
       ]);

       // Création du nouveau lieu
       $lieu = Lieu::create([
           'Code_lieu' => $validatedData['Code_lieu'],
           'Libelle_lieu' => $validatedData['Libelle_lieu'],
       ]);

       // Retourner une réponse JSON
       return response()->json([
           'success' => true,
           'lieu' => $lieu
       ]);
   }


   



}
