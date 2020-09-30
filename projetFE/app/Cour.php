<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model

{
    protected $fillable =[
        'titre_cour', 'description' ,'enseignant_id'
    ];

    
    protected $table = 'cours';
   




    public function enseignant ()
    {
        return $this->belongsTo('App\Enseignant');
    }

    public function etudiants(){
        return $this->belongsToMany('App\Etudiant');
    }

    public function lecons(){
        return $this->hasMany('App\Lecon');
    }

    public function examens(){
        return $this->hasMany('App\Examen');
    }
}

