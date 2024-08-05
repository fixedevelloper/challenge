<?php


namespace App\Http\Controllers;



use App\Helper\Helper;
use App\Helper\PaymooneyService;
use App\Models\Candidat;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Rubrique;
use App\Models\RubriqueCandidat;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    private $paymooneyService;

    /**
     * HomeController constructor.
     * @param $paymooneyService
     */
    public function __construct(PaymooneyService $paymooneyService)
    {
        $this->paymooneyService = $paymooneyService;
    }

    public function home()
    {

        return view('home', [
            'rubriques'=>Rubrique::all()
        ]);
    }
    public function about()
    {

        return view('about', [

        ]);
    }

    public function voting(Request $request)
    {
        $candidat=Candidat::query()->find($request->id);
        if ($request->method()=='POST'){
            $cr=RubriqueCandidat::query()->firstWhere(['candidat_id'=>$request->id,'rubrique_id'=>$request->maille]);
            $amount=$request->amount;
            $vote=new Vote();
            $vote->quantity=$amount/100;
            $vote->rubrique_candidat_id=$cr->id;
            $vote->save();
            Session::put('vote_id',$vote->id);
           $resp= $this->paymooneyService->make_payment([
                'rubrique'=>'$cr->rubrique->name',
                'vote_id'=>$vote->id,
                'amount'=>$amount,
            ]);
           if ($resp['status']=='success'){
               return  redirect($resp['url']);
           }

        }

        return view('voting', [
            'candidat'=>$candidat,
            'votes'=>Helper::voteCandidatRubrique($candidat->id,$request->maille)
        ]);
    }
    public function rubrique(Request $request)
    {
        $rubrique=Rubrique::query()->find($request->id);
        $candidats=RubriqueCandidat::query()->where('rubrique_id','=',$request->id)->get();
        return view('candidat', [
            'rubrique'=>$rubrique,
            'candidats'=>$candidats
        ]);
    }
    public function callback(Request $request)
    {
        $ref=$request->get('vote_id');
        logger($_POST["status"]);
        if(isset($_POST["status"]))
            $status=$_POST["status"];
        if ($request->get('status')=='Status'){
            logger($request->all());
        }
    }
    public function cancel(Request $request)
    {
        logger($request->status);
        $ref=$request->get('vote_id');
        $vote=Vote::query()->find($ref);
        $vote->status='rejected';
        $vote->save();
        return view('cancel', [

        ]);
    }
    public function success(Request $request)
    {
        logger($_POST["status"]);
        $ref=$request->get('vote_id');
        $vote=Vote::query()->find($ref);

        if(isset($_POST["status"]))
            $status=$_POST["status"];
        $vote->status='accepted';
        $vote->save();
        return view('success', [

        ]);
    }
    public function orientation_academique()
    {

        return view('services.orientation_academique', [

        ]);
    }
    public function procedure_consulaire()
    {

        return view('services.procedure_consulaire', [

        ]);
    }
    public function reservation_billet()
    {

        return view('services.reservation_billet', [

        ]);
    }
    public function partenaire()
    {

        return view('partenaire', [

        ]);
    }
    public function destination()
    {

        return view('destination', [

        ]);
    }
    public function representation_congo()
    {

        return view('representation_congo', [

        ]);
    }
    public function representation_rdc()
    {

        return view('representation_rdc', [

        ]);
    }
    public function faq()
    {

        return view('faq', [

        ]);
    }
    public function formation()
    {

        return view('formation', [

        ]);
    }
    function registerFormation(){
        return view('form.register');
    }
}
