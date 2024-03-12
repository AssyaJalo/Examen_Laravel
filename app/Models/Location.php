<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = array('vehicules_id','clients_id','LieuDepart','LieuArriver','Date','HeurDepart','HeurArriver');
    public static $rules = array(
    'vehicules_id' => 'required|integer',
    'clients_id' => 'required|integer',
    'LieuDepart' => 'required|',
    'LieuArriver' => 'required|',
    'Date' => 'required|',
    'HeurDepart' => 'required|',
    'HeurArriver' => 'required|'
    );

    public function client()
    {
        return $this->belongsToMany(Client::class,'clients_id');
    }
    public function vehicle()
    {
        return $this->hasMany(Vehicule::class,'vehicules_id');
    }
}
