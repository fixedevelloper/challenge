<?php


namespace App\Http\Controllers;


use App\Helper\UploadableTrait;
use App\Models\Candidat;
use App\Models\Edition;
use App\Models\Rubrique;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class backendController extends Controller
{
    use UploadableTrait;
    function dashboard(Request $request){
        return view('bakend.dashboard');
    }
    function rubrique(Request $request){
        if ($request->method()=='POST'){
            $rubrique=new Rubrique();
            $rubrique->name=$request->name;
            $rubrique->save();
        }
        $items=Rubrique::all();
        return view('bakend.rubrique',[
            'items'=>$items
        ]);
    }
    function edition(Request $request){
        if ($request->method()=='POST'){
            $edition=new Edition();
            $edition->name=$request->name;
            $edition->status='active';
            $edition->save();
        }
        $items=Edition::all();
        return view('bakend.edition',[
            'items'=>$items
        ]);
    }
    function candidat(Request $request){
        $edition=Edition::query()->firstWhere(['status'=>'active']);
        if ($request->method()=='POST'){
            $candidat=new Candidat();
            $candidat->name=$request->name;
            $candidat->name_artist=$request->artist_name;
            $candidat->phone=$request->phone;
            $candidat->numero=$request->numero;
            $candidat->edition_id=$edition->id;
            if ($request->hasFile('photo') && $request->file('photo') instanceof UploadedFile) {
                $photo = $this->storeFile($request->file('photo'), 'photos');
                $candidat->photo=$photo;
            }
            $candidat->save();
            for ($i=0;$i<sizeof($request->rubriques);$i++){
                $candidat->rubriques()->attach($request->rubriques[$i]);
            }
           // $candidat->rubriques()->sync($request->rubriques);

        }
        $rubriques=Rubrique::all();
        $items=Candidat::query()->where('edition_id','=',$edition->id)
            ->where('activate','=',true)->paginate(20);
        return view('bakend.candidat',[
            'items'=>$items,
            'rubriques'=>$rubriques
        ]);
    }
    function vote(Request $request){
        $items=Vote::query()
            ->leftJoin('rubrique_candidats','rubrique_candidats.id','=','votes.id')
            ->leftJoin('candidats','candidats.id','=','rubrique_candidats.candidat_id')
            ->where(['status'=>'ACTIVATED','activate'=>true])
            ->paginate(20);
        return view('bakend.vote',[
            'items'=>$items,
        ]);
    }
    public function candidat_edit(Request $request,$id)
    {   $candidat=Candidat::query()->find($id);
        if ($request->method() == "POST"){
            $candidat->name=$request->name;
            $candidat->name_artist=$request->artist_name;
            $candidat->phone=$request->phone;
            $candidat->numero=$request->numero;
            if ($request->hasFile('photo') && $request->file('photo') instanceof UploadedFile) {
                $photo = $this->storeFile($request->file('photo'), 'photos');
                $candidat->photo=$photo;
            }
            $candidat->save();
            if (isset($request->rubriques) && sizeof($request->rubriques)>0){
                for ($i=0;$i<sizeof($request->rubriques);$i++){
                    $candidat->rubriques()->attach($request->rubriques[$i]);
                }
            }

            return redirect()->back();
        }

        return view('bakend.modals.edit_candidat', [
            'candidat'=>$candidat,
            'rubriques'=>Rubrique::all()
        ]);
    }
    public function candidat_delete(Request $request,$id)
    {   $candidat=Candidat::query()->find($id);
        if ($request->method() == "POST"){
            $candidat->activate=false;
            $candidat->save();
            return redirect()->back();
        }

        return view('bakend.modals.delete_candidat', [
            'candidat'=>$candidat,
        ]);
    }
}
