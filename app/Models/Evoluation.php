<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evoluation extends Model
{
    protected $fillable = array('chauffeurs_id','clients_id','note','commentaire');
    public static $rules = array(
    'chauffeurs_id' => 'required|integer',
    'clients_id' => 'required|integer',
    'note' => 'required|',
    'commentaire' => 'required|',
    );

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class,'chauffeurs_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'clients_id');
    }
}
