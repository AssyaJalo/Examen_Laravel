<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = array('Locations_id','Montant_Tarif','Date_paiement','Moyen_paiement','Facture_paiement','Distance');
    public static $rules = array('Locations_id' => 'required|integer',
    'Montant_Tarif' => 'required|',
    'Date_paiement' => 'required|',
    'Moyen_paiement' => 'required|',
    'Facture_paiement' => 'required|',
    'Distance' => 'required|',
);
}
