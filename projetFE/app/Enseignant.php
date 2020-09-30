<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Enseignant extends Authenticatable

{
    use Notifiable; 

   protected $guard='enseignant';


    protected $fillable=[
        'prenom', 'nom', 'genre', 'date_de_naissance', 'pays', 'email', 'password'
    ];
    public function cours(){

        return $this->hasMany('App\Cour');
    }
}

