<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tarif;
use DateTime;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function listeTarif(){
        $tarif = Tarif::all();
        return view('tarif',compact('tarif'));
    }

    private function generateFacture()
    {
       return $facture = 'FR' . '-' . date('YmdHis');
    }
    public function ajouterTarif()
    {
        $locations = Location::all();
        $facture = $this->generateFacture();
        return view('ajouterTarif', ['facture' => $facture, 'locations' => $locations]);
    }

    public function ajoutTraitementTarif(Request $request){
       
        $request->validate([
            'Locations_id' =>'required|integer',
            'Montant_Tarif' => 'required',
            'Date_paiement' => 'required',
            'Moyen_paiement' => 'required',
            'Distance' => 'required',  
        ]);
        $facture = $this->generateFacture();
        //array_merge() combine ces deux ensembles de données en un seul tableau.
        Tarif::create(array_merge($request->all(), ['Facture_paiement' => $facture]));
        return redirect('/tarif')->with('status','Ajouter avec sucees');


    }


}
