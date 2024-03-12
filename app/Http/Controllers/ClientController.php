<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function listeClient(){
        $client = Client::all();
        return view('client',compact('client'));
    }
    public function ajouterClient()
    {
        return view('ajouterClient');
    }
    public function ajoutTraitementClient(Request $request){
       
        $request->validate([
            'nomClient' =>'required',
            'prenomClient' => 'required',
            'emailClient' => 'required',
            'telephoneClient' => 'required',
           
        ]);

        Client::create($request->all());
        return redirect('/client')->with('status','Ajouter avec sucees');


    }

    public function supprimerClient($id){
        $client = Client::find($id);
        $client->delete();
        return redirect('/client')->with('status', 'Modifié avec succès');
        
     }

}
