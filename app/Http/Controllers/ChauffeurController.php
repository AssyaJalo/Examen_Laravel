<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function listeChauffeur(){
        $chauffeur = Chauffeur::all();
        return view('chauffeur',compact('chauffeur'));
    }
    private function generatePermis()
    {
        $partie1 = mt_rand(1000, 9999); 
        $partie2 = mt_rand(1000, 9999); // fonction php qui genere des valeurs aleatoirs entiers et prends 2argument(min,max)
        return $partie1 . '.' . $partie2;
    }
    public function ajouterChauffeur()
    {
        $permis = $this->generatePermis();
        return view('ajouterChauffeur', ['permis' => $permis]);
    }
    public function ajoutTraitementChauffeur(Request $request){
       
        $request->validate([
            'Nom' =>'required',
            'Prenom' => 'required',
            'Email' => 'required',
            'Emission' => 'required',
            'Expiration' => 'required',
            'Categorie' => 'required',
           
        ]);
        $permis = $this->generatePermis();
        //array_merge() combine ces deux ensembles de données en un seul tableau.
        Chauffeur::create(array_merge($request->all(), ['Permis' => $permis]));
        // Chauffeur::create($request->all());
        return redirect('/chauffeur')->with('status','Ajouter avec sucees');

    }

    public function supprimerChauffeur($id){
        $chauffeur = Chauffeur::find($id);
        $chauffeur->delete();
        return redirect('/chauffeur')->with('status', 'Supprimer avec succès');
        
     }
}
