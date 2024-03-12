<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Location;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function listeLocation(){
        $location = Location::all();
        return view('location',compact('location'));
    }

    public function ajouterLocation()
    {
        $vehicules = Vehicule::all();
        $clients = Client::all();
        return view('ajouterLocation',['vehicules' => $vehicules,'clients'=> $clients]);
    }
    public function ajoutTraitementLocation(Request $request){
       
        $request->validate([
            'vehicules_id' =>'required|integer',
            'clients_id' => 'required|integer',
            'LieuDepart' => 'required',
            'LieuArriver' => 'required',
            'Date' => 'required',
            'HeurDepart' => 'required',
            'HeurArriver' => 'required',
           
           
        ]);
        $vehicule = Vehicule::find($request->vehicules_id);
        if ($vehicule->location()->exists()) {
            return back()->withErrors(['message' => 'Le véhicule est déjà assigné à une location.']);
        }
        // $vehicule->id = $request->id;
        Location::create($request->all());
        return redirect('/location')->with('status','Ajouter avec sucees');


    }

    public function modifierLocation($id){
        $location = Location::find($id);
        $vehicules = Vehicule::all();
        $clients = Client::all();
        
        return view('modifierLocation',['location' => $location,'vehicules' => $vehicules,'clients'=> $clients]);
    }

    public function modifierTraitementLocation(Request $request){
        $request->validate([
            'vehicules_id' =>'required|integer',
            'clients_id' => 'required|integer',
            'LieuDepart' => 'required',
            'LieuArriver' => 'required',
            'Date' => 'required',
            'HeurDepart' => 'required',
            'HeurArriver' => 'required',
     ]);
     $vehicule = Vehicule::find($request->vehicules_id);
     if ($vehicule->location()->exists()) {
         return back()->withErrors(['message' => 'Le véhicule est déjà assigné à une location.']);
     }
     $location = Location::find($request->id);
     if (!$location) {
        return redirect('/location')->with('status','location non trouver');
    }
    $location->update($request->all());

    return redirect('/location')->with('status', 'Location modifiée avec succès');
    }

    public function supprimerLocation($id){
        $location = Location::find($id);
        $location->delete();
    
        return redirect('/location')->with('status', 'Supprimé avec succès');
    }
    
 
}
