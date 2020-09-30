<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{

    protected $fillable =[
        'num_exercice','contenu' ,'examen_id'
    ];
    public function examen(){
        return $this->belongsTo('App\Examen');
    }

    public function etudiants()
    {
        return $this->belongsToMany('App\Etudiant');
    }

   

}
