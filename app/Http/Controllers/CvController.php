<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\uploadedFile;

use App\Cv;
use App\Experience;
use App\Projet;
use App\Formation;
use App\Competence;

use Auth;

use Image;

use App\Http\Requests\cvRequest;

class CvController extends Controller
{
	//auth
	public function __construct(){
		$this->middleware('auth');
	}


	//index list des cvs
    public function index()
    {
    	if(Auth::user()->is_admin)
    		$listcv=Cv::all();
    	else
    		$listcv=Auth::user()->cvs;
    	
    	return view('cv.index',['cvs'=>$listcv]);
    }

    //creation Cv
     public function create()
    {
    	return view('cv.create'); 
    }


    //enregistrement CV dans la DB
     public function store(cvRequest $request)
    {
    	$cv=new Cv();
    	$cv->titre=$request->input('titre');
    	$cv->presentation=$request->input('presentation');
    	$cv->user_id=Auth::user()->id;
    	if($request->hasFile('photo')){
    		$cv->photo=$request->photo->store('image');
    	}

    	$cv->save();
    	session()->flash('success','le cv a ete bien enregistrer');
    	return redirect('cvs');
    }


    //editer Cv
     public function edit($id)
    {
    	$cv=Cv::find($id);

    	$this->authorize('update',$cv);
    	return view('cv.edit',['cv'=>$cv]);
    }


    //update CV dans la db
     public function update(cvRequest $request ,$id)
    {
    	$cv=Cv::find($id);
    	$cv->titre=$request->input('titre');
    	$cv->presentation=$request->input('presentation');
    	if($request->hasFile('photo')){
    		$cv->photo=$request->photo->store('image');
    	}
    	$cv->save();
    	return redirect('cvs');
    }


    //effacer CV dans le DB
     public function destroy(Request $request,$id)
    {
    	$cv=Cv::find($id);
    	$this->authorize('delete',$cv);	
    	$cv->delete();
    	return redirect('cvs');
    }


    //show
    public function show($id)
    {
    	return view('cv.show',['id'=>$id]);
    }

    public function getData($id){

        $cv=Cv::find($id);
        $experiences=$cv->experiences()->orderBy('debut','desc')->get();
        $formations=$cv->formations()->orderBy('debut','desc')->get();
        $competences=$cv->competences()->orderBy('updated_at','desc')->get();
        $projets=$cv->projets()->orderBy('updated_at','desc')->get();
         return Response()->json([
                                    'experiences'=>$experiences,
                                    'formations'=>$formations,
                                    'competences'=>$competences,
                                    'projets'=>$projets
                                ]);
    }

    public function addExperience(Request $request){

        $experience=new Experience;
        $experience->titre=$request->titre;
        $experience->body=$request->body;
        $experience->debut=$request->debut;
        $experience->fin=$request->fin;
        $experience->cv_id=$request->cv_id;

        $experience->save();

        return Response()->json(['etat' =>true, 'id' =>$experience->id]);
    }
    public function updateExperience(Request $request){
         $experience=Experience::find($request->id);
        $experience->titre=$request->titre;
        $experience->body=$request->body;
        $experience->debut=$request->debut;
        $experience->fin=$request->fin;
        $experience->cv_id=$request->cv_id;

        $experience->save();

        return Response()->json(['etat' =>true]);
    }

    public function deleteExperience($id){
         $experience=Experience::find($id);
        $experience->delete(); 

        return Response()->json(['etat' =>true]);
    }
// module projet

    public function addProjet(Request $request){

        $projet=new Projet;
        $projet->titre=$request->titre;
        $projet->description=$request->description;
        $projet->lien=$request->lien;
        $projet->image=$request->image;
        $projet->cv_id=$request->cv_id;

        $projet->save();

        return Response()->json(['etat' =>true, 'id' =>$projet->id]);
    }
    public function updateProjet(Request $request){
         $projet=Projet::find($request->id);
        $projet->titre=$request->titre;
        $projet->description=$request->description;
        $projet->lien=$request->lien;
        $projet->image=$request->image;
        $projet->cv_id=$request->cv_id;

        $projet->save();

        return Response()->json(['etat' =>true]);
    }

    public function deleteProjet($id){
         $projet=Projet::find($id);
        $projet->delete(); 

        return Response()->json(['etat' =>true]);
    }

//module formation

    public function addFormation(Request $request){

        $formation=new Formation;
        $formation->titre=$request->titre;
        $formation->body=$request->body;
        $formation->debut=$request->debut;
        $formation->fin=$request->fin;
        $formation->cv_id=$request->cv_id;

        $formation->save();

        return Response()->json(['etat' =>true, 'id' =>$formation->id]);
    }
    public function updateFormation(Request $request){
         $formation=Formation::find($request->id);
        $formation->titre=$request->titre;
        $formation->body=$request->body;
        $formation->debut=$request->debut;
        $formation->fin=$request->fin;
        $formation->cv_id=$request->cv_id;

        $formation->save();

        return Response()->json(['etat' =>true]);
    }

    public function deleteFormation($id){
         $formation=Formation::find($id);
        $formation->delete(); 

        return Response()->json(['etat' =>true]);
    }

//module Competence
     public function addCompetence(Request $request){

        $competence=new Competence;
        $competence->titre=$request->titre;
        $competence->description=$request->description;
        $competence->cv_id=$request->cv_id;

        $competence->save();

        return Response()->json(['etat' =>true, 'id' =>$competence->id]);
    }
    public function updateCompetence(Request $request){
         $competence=Competence::find($request->id);
        $competence->titre=$request->titre;
        $competence->description=$request->description;
        $competence->cv_id=$request->cv_id;

        $competence->save();

        return Response()->json(['etat' =>true]);
    }

    public function deleteCompetence($id){
         $competence=Competence::find($id);
        $competence->delete(); 

        return Response()->json(['etat' =>true]);
    }

}
