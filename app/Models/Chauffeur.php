<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    protected $fillable = array('Nom','Prenom','Email','Permis','Emission','Expiration','Categorie');
    public static $rules = array(
    'Nom' => 'required|min:2',
    'Prenom' => 'required|min:3',
    'Email' => 'required|',
    'Permis' => 'required|',
    'Emission' => 'required|',
    'Expiration' => 'required|',
    'Categorie' => 'required|'
);

public function vehicules()
{
    return $this->hasOne(Vehicule::class,'chauffeurs_id');
}
    //use HasFactory;
}
