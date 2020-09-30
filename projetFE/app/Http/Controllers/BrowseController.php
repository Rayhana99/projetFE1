<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;
use App\Enseignant;
use App\Cour;
use App\Lecon;
use App\Examen;
use App\Exercice;
use Auth;

class BrowseController extends Controller
{
    // *********functions views**********
    public function index (){
  
        $cours = Enseignant::where('id',Auth::guard('enseignant')->user()->id)->with('cours')->first();

        

        return view('browse.index',[
            'cours'=> $cours,
        ]);
    }

   public function content($id){
    
    $cours= Cour::findOrFail($id);
    $lecon = Cour::where('id' , $cours->id)->with( 'lecons')->first();
    $examen = Cour::where('id' , $cours->id)->with( 'examens')->first();
    return view('browse.browsecontent',
    ['cour'=> $cours,
    'courss'=> $lecon,
    'coursss'=>$examen
    
    ]);



   }
  










 // *******store functions*************
   
   

 

   // ********download function **********
   public function download ($file_name){
       $file_path=public_path('files/'.$file_name);
       return response()->download($file_path);

   }




 

}
