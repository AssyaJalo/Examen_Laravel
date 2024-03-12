<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Client;
use App\Models\Evoluation;
use App\Models\Location;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function listeEvaluation(){
        $evaluation = Evoluation::all();
        return view('evaluation',compact('evaluation'));
    }
    public function ajouterEvaluation()
    {
        $evaluation = Evoluation::all();
        $chauffeurs = Chauffeur::all();
        $clients = Client::all();
        return view('ajouterEvaluation', ['evaluation' => $evaluation,'chauffeurs' => $chauffeurs,'clients'=> $clients]);
    }

    public function ajoutTraitementevaluation(Request $request){
       
        $request->validate([
            // 'chauffeurs_id' =>'required|integer',
            // 'clients_id' =>'required|integer',
            'note' => 'required',
            'commentaire' => 'required', 
        ]);
            $clientId = auth()->user()->id;
          // Récupérer l'ID du chauffeur à partir de la dernière location du client
            $lastLocation = Location::where('clients_id', $clientId)->latest()->first();
            $chauffeurId = $lastLocation->chauffeur_id;
        Evoluation::create([
            'chauffeurs_id' => $request->input('chauffeurs_id'),
            'clients_id' => $clientId,
            'note' => $request->input('note'),
            'commentaire' => $request->input('commentaire'),
        ]);
       
        return redirect('/evaluation')->with('status','Ajouter avec sucees');


    }
}
