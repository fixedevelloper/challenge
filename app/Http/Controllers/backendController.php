<?php


namespace App\Http\Controllers;


use App\Helper\UploadableTrait;
use App\Models\Candidat;
use App\Models\Edition;
use App\Models\Rubrique;
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
            $candidat->name_artist=$request->name_artist;
            $candidat->phone=$request->phone;
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
        $items=Candidat::query()->where('edition_id','=',$edition->id)->paginate(20);
        return view('bakend.candidat',[
            'items'=>$items,
            'rubriques'=>$rubriques
        ]);
    }
    function vote(Request $request){
        return view('bakend.vote');
    }
    public function edition_modal(Request $request)
    {   $crypto=CryptoMonaire::query()->find($request->id);
        if ($request->method() == "POST"){
            if ($crypto->status==false){
                toastr()->success("Crypto not activate", 'Error request', ["Failed loggedIn"]);
                return back();
            }
            $crypto->taux=$request->get('taux_buy');
            $crypto->taux_sell=$request->get('taux_sell');
            $crypto->save();
            toastr()->success("Wallet add successful", 'Successful request', ["Failed loggedIn"]);
            return redirect()->back();
        }

        return view('admin.modals.taux_echange', [
            'crypto'=>$crypto,
            'quantity'=>$request->quantity,
            'currency_sell'=>$request->currency_sell,
        ]);
    }
}
