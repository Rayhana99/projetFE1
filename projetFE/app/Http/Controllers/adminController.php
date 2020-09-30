<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enseignant;
use App\Etudiant;



class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function admin (){


        return view('administrateur.admin');
    }

   public function account(){
       
    $enseignant=Enseignant::get();
    $etudiant=Etudiant::get();
    return view('administrateur.account',
    ['ense'=>$enseignant,
      'etud'=>$etudiant
    ]);


   }


   public function destroyenseignant($id){
    $enseignant=Enseignant::findOrFail($id);
    $enseignant->delete();
    return redirect()->intended(route('admin'));
}

public function destroyetudiant($id){
    $etudiant=Etudiant::findOrFail($id);
    $etudiant->delete();
    return redirect()->intended(route('admin'));
}
   public function addaccount(){
        
    return view('administrateur.addaccount');

   }



}