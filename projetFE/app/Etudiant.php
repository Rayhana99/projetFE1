<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends Authenticatable
{

    use Notifiable; 

   protected $guard='etudiant';



    protected $fillable=[
        'name',  'prenom',  'genre', 'date_de_naissance', 'pays', 'email', 'password'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
     public function cours(){
        // return $this->belongsToMany('App\Cour');
         return $this->belongsToMany('App\Cour','inscriptions','etudiant_id','cour_id');
     }

     public function examans(){
        return $this->belongsToMany('App\Examan');
    }

    public function exercices(){
        return $this->belongsToMany('App\Exercice','',);
    }
}

