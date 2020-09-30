<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecon extends Model
{
    protected $fillable =[
        'titre_ressource', 'titre_lecon', 'contenu' ,'cour_id'
    ];
    public function cour(){
        return $this->belongsTo('App\Cour');
    }

    public function exercices(){
        return $this->hasMany('App\Exercice');
    }
}
