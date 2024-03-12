<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Contracts\Service\Attribute\Required;

class Client extends Model
{
    protected $fillable = array('nomClient','prenomClient','emailClient','telephoneClient');
    public static $rules = array('nomClient' => 'Required|min:2',
    'prenomClient' => 'Required|min:3',
    'emailClient' => 'Required|',
    'telephoneClient' => 'Required|');
    

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
