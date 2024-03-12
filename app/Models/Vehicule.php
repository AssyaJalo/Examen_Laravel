<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{


    protected $fillable = array('chauffeurs_id','type_vehicules_id','Achat','Kilometre','Matricule','photo','Statut','Marque');
    public static $rules = array('chauffeurs_id' => 'required|integer',
    'type_vehicules_id' => 'required|integer',
    'Achat' => 'required|',
    'Kilometre' => 'required|',
    'Matricule' => 'required|',
    'photo' => 'required|',
    'Statut' => 'required|',
    'Marque' => 'required|'
);

    public function chauffeurs()
    {
        return $this->belongsTo(Chauffeur::class,'chauffeurs_id');
    }
   
    public function type()
    {
        return $this->belongsToMany(TypeVehicule::class);
    }
    public function location()
    {
        return $this->hasOne(Location::class,'vehicules_id');
    }
}
