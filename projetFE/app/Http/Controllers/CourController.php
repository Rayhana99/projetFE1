<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;
use App\Cour;
use App\Lecon;
use App\Examen;
use App\Exercice;
use Auth;

class CourController extends Controller
{
    // *********functions views**********
    public function index (){
  
        $cours = Cour::latest()->get();


        return view('cours.index',[
            'cours'=> $cours,
            'titre_cour'=>request('titre_cour'),
            'description'=>request('description'),
            'enseignant_id'=>Auth::guard('enseignant')->user()->id
        ]);
    }

   public function content($id){
    
    $cours= Cour::findOrFail($id);
    $lecon = Cour::where('id' , $cours->id)->with( 'lecons')->first();
    $examen = Cour::where('id' , $cours->id)->with( 'examens')->first();
    return view('cours.content',
    ['cour'=> $cours,
    'courss'=> $lecon,
    'coursss'=>$examen
    
    ]);



   }
   public function exam($id){

    $examen=Examen::findOrFail($id);
    $exercice = Examen::where('id' , $examen->id)->with('exercices')->first();
    return view('cours.exam',
    ['coursss'=>$examen,
     'exer'=>$exercice
    ]);




}



public function showcontent($id){
    $cours= Cour::findOrFail($id);

    $lecon = Cour::where('id' , $cours->id)->with( 'lecons')->first();
    $examen = Cour::where('id' , $cours->id)->with('examens')->first();


    return view('cours.showcoursecontent',
    ['cour'=>$cours,
     'courss'=>$lecon,
     'coursss'=>$examen
     
    
    ]);
}
 // *******store functions*************
    public function store (){
       
        $cour =new Cour();
        
        $cour->titre_cour=request('titre_cour');
        $cour->description=request('description');
       $cour->enseignant_id=Auth::guard('enseignant')->user()->id;
     
        $cour->save();
     

       



        return  redirect()->intended(route('cour.index'));
    }

    public function storelecon (request $request,$id){
     $cours=Cour::find($id);
     $cour=new Cour();
     $lecon =new Lecon();

     $this->validate($request,[
        'My_File'=>'image|mimes:jpeg,png,jpg,gif,svg',
        'My_File'=>'file|mimes:pdf'
     ]);
     $lecon->titre_ressource=request('titre_ressource');
     $lecon->titre_lecon=request('titre_lecon');
     if($request->hasFile('My_File')){
       // $lecon->contenu=$request->My_File->store('leconsfiles','public');
       $file= $request->file('My_File');
       $fileName=$file->getClientOriginalName();
       $destinationPath=public_path().'/files/';
       $file->move($destinationPath , $fileName);
       $lecon->contenu=$fileName;
     }
     
     $lecon->cour()->associate($cours); 

   
     $lecon->save();
  
    
     return redirect(route('cour.content' , $cours->id ));
 }


 public function storeexamen ($id){
    $cours=Cour::find($id);
   $cour=new Cour();
    
  
 $examen =new Examen();
 $examen->titre_ressource=request('titre_ressource');
 $examen->examen_sujet=request('examen_sujet');
 $examen->type=request('type');
 
 $examen->cour()->associate($cours); 


 $examen->save();
 return redirect(route('cour.content' , $cours->id ));

}

public function storeexercice(request $request,$id){
    $examen=Examen::find($id);
 
    $exercice=new Exercice();
    $this->validate($request,[
     'My_File'=>'image|mimes:jpeg,png,jpg,gif,svg',
     'My_File'=>'file|mimes:pdf']);
    $exercice->num_exercice=request('num_exercice');
    if($request->hasFile('My_File')){
    // $exercice->contenu=$request->My_File->store('exercicefiles','public');
     $file= $request->file('My_File');
        $fileName=$file->getClientOriginalName();
        $destinationPath=public_path().'/files/';
        $file->move($destinationPath , $fileName);
        $exercice->contenu=$fileName;
  }
    
    
    $exercice->Examen()->associate($examen);
    $exercice->save();
 
 
   return redirect(route('exam.content' , $examen->id ));
 
 }
   // ********download function **********
   public function download ($file_name){
       $file_path=public_path('files/'.$file_name);
       return response()->download($file_path);

   }




 // *********destroy functions************
public function destroycour($id){
    $cour=Cour::findOrFail($id);
    $cour->delete();

    return redirect()->intended(route('cour.index'));
}

public function destroylecon($id){
    $lecon=Lecon::findOrFail($id);
    $lecon->delete();
    
    //return redirect()->intended(route('show.content', $lecon->id));
    return redirect()->intended(route('cour.index'));
}

public function destroyexamen($id){
    $examen=Examen::findOrFail($id);
    $examen->delete();
    return redirect()->intended(route('cour.index'));
}


public function destroyexercice($id){
    $exercice=Exercice::findOrFail($id);
    $exercice->delete();
    return redirect()->intended(route('cour.index'));
}








}
