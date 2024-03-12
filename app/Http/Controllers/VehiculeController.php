<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Location;
use App\Models\TypeVehicule;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function listeVehicule(){
        $vehicule = Vehicule::all();
        return view('vehicule',compact('vehicule'));
    }

    private function generateMatricule()
    {
        $matricule = '';
        $matricule = 'DK' . ' ' . rand(100, 999) . ' ' . strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)));
        return $matricule;
    }
    public function ajouterVehicule()
    {
        $chauffeurs = Chauffeur::all();
        $types = TypeVehicule::all();
        return view('ajouterVehicule',['chauffeurs' => $chauffeurs,'types'=> $types]);
    }
    public function ajoutTraitementVehicule(Request $request){
       
        $request->validate([
             'chauffeurs_id' =>'required|integer',
            'type_vehicules_id'=>'required|integer',
            'Achat' => 'required',
            'Kilometre' => 'required|numeric',
            'photo' => 'required|file|mimes:png,jpg,jpeg,webp',
            'Statut' => 'required|',
            'Marque' => 'required|',
           
        ]);


        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = $file-> getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'images/vehicules/';
            $file->move($path,$filename);
       
        $chauffeur = Chauffeur::findOrFail($request->chauffeurs_id);
        if($chauffeur->Expiration <= now()){
            return back()->withErrors(['message' => 'La date d\'expiration de votre permis est expirée. Vous ne pouvez pas avoir de voiture.']);
        }
        if ($chauffeur->vehicules()->exists()) {
            return back()->withErrors(['message' => 'Le chauffeur est déjà associé à un véhicule.']);
        }
    
        $Matricule = $this->generateMatricule();
        $vehicule = new Vehicule();
        $vehicule->fill($request->except('chauffeurs_id'));
        $vehicule->chauffeurs_id = $request->chauffeurs_id;
        $vehicule->Matricule = $Matricule;
        $vehicule->photo = $filename;
        $vehicule->save();
        return redirect('/vehicule')->with('status','Ajouter avec sucees');
    }  else {
        
        return back()->withErrors(['message' => 'Le fichier téléchargé n\'est pas valide.']);
    }


    }

    public function modifierVehicule($id){
        $vehicule = Vehicule::find($id);
        $types = TypeVehicule::all();
        $chauffeurs = Chauffeur::all();
        return view('modifiervehicule',compact('vehicule','types','chauffeurs'));
    }
   
    public function modifierTraitementVehicule(Request $request){
        $request->validate([
            'chauffeurs_id' =>'required|integer',
            'type_vehicules_id'=>'required|integer',
            'Achat' => 'required',
            'Kilometre' => 'required|numeric',
            'photo' => $request->hasFile('photo') ? 'nullable|file|mimes:png,jpg,jpeg,webp' : '', // Validation conditionnelle du champ photo
            'Statut' => 'required',
            'Marque' => 'required|',
     ]);

     $vehicule = Vehicule::find($request->id);
     if (!$vehicule) {
        return redirect('/vehicule')->with('error', 'vehicule non trouvé');
    }
    $vehicule->update($request->all());

    return redirect('/vehicule')->with('status', 'Modifié avec succès');
    }

public function supprimerVehicule($id){
    // Supprimer toutes les locations associées au véhicule
    Location::where('vehicules_id', $id)->delete();

    // Supprimer le véhicule lui-même
    
    
$vehicule = Vehicule::find($id);
    $vehicule->delete();

    return redirect('/vehicule')->with('status', 'Supprimé avec succès');
}


public function CountVehicule()
{
    $vehiclesHorsService = Vehicule::where('Statut', 'Hors service')->get();
    $vehiclesEnService = Vehicule::where('Statut', 'En service')->get();
    $vehiclesEnReparation = Vehicule::where('Statut', 'En réparation')->get();

    return view('CountVehicule', compact('vehiclesHorsService', 'vehiclesEnService','vehiclesEnReparation'));
}

}
