<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrateur extends Authenticatable
{

    use Notifiable; 

    protected $guard='admin';

   /* protected $fillable=[
        'prenom', 'nom', 'genre', 'date_de_naissance', 'pays', 'email', 'mot_de_passe'
    ];*/

    protected $fillable = [
        'name', 'email', 'password','is_super'
    ];

    protected $hidden = [
        'motDePasse', 'remember_token',
    ];
}

