<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable =['note' ];
    public function etudiants (){
        return $this->hasOne('App\Etudiant');
    }

    public function examans(){
        return $this->hasOne('App\Examan');
    }
}
