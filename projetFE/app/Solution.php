<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable =[
       'reponse'
    ];
    public function etudiant (){
        return $this->hasOne('App\Etudiant');
    }

    public function exercice (){
        return $this->hasOne('App\Exercice');
    }
}

