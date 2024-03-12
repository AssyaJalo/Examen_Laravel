<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVehicule extends Model
{
    protected $fillable = array('typeVehicule');
    public static $rules = array('typeVehicule' => 'Required|');


    public function vehicles()
    {
        return $this->belongsToMany(Vehicule::class);
    }
    //use HasFactory;
}
