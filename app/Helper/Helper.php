<?php


namespace App\Helper;


use App\Models\RubriqueCandidat;
use App\Models\Vote;
use Illuminate\Support\Facades\Mail;

class Helper
{

    public static function send_contact($data)
    {
        $data_ = array('email' => $data['email'],
            'name' => $data['name'],'subject' => 'contact form','data' => $data['message']);
        Mail::send(['html' => 'mails.contact'], $data_, function ($message)
        use ($data) {
            $message->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->from($data['email'], $data['name'])->subject("Contact form");
                  });

    }
    public static function voteCandidatRubrique($candidat_id,$rubrique_id){
        $cr=RubriqueCandidat::query()->firstWhere(['candidat_id'=>$candidat_id,'rubrique_id'=>$rubrique_id]);
        $votes=Vote::query()->where(['rubrique_candidat_id'=>$cr->id,'status'=>'ACCEPTED'])->get();
        $quqntity=0;
        foreach ($votes as $vote){
            $quqntity+=$vote->quantity;
        }
        return $quqntity;
    }
    public static function voteCandidatRubriqueID($id){
        $votes=Vote::query()->where(['rubrique_candidat_id'=>$id,'status'=>'ACCEPTED'])->get();
        $quqntity=0;
        foreach ($votes as $vote){
            $quqntity+=$vote->quantity;
        }
        return $quqntity;
    }
    public static function makeDescriptionRubrique($name){
        $description='';
        switch (strtolower($name)){
            case 'miss':
                $description='Cette rubrique met en lumière les candidates exceptionnelles qui allient beauté, intelligence et talent.
                Découvrez les portraits des participantes, leurs parcours inspirants,
                 et suivez les dernières nouvelles et les moments forts des concours.';
                break;
            case 'mister':
                $description='Découvrez l\'univers captivant des concours de beauté masculine, où charisme, élégance et talent se rencontrent. Explorez les profils des candidats, les moments forts des compétitions,
                et les histoires inspirantes de ces hommes qui aspirent à devenir les représentants du style et de la sophistication';
                break;
            case 'street wear':
                $description='Explorez l\'univers dynamique de la mode urbaine où style, confort et individualité se rencontrent. Découvrez les dernières tendances, les collections innovantes,
                et les marques incontournables qui définissent le streetwear contemporain.';
                break;
            case 'chant':
                $description='Découvrez les voix exceptionnelles qui se démarquent sur scène, explorez les coulisses de la compétition, et suivez les performances captivantes des candidats.
                 Nous vous offrons un aperçu des talents émergents, des interviews exclusives, et des moments forts du concours..';
                break;
            case 'gospel':
                $description='Plongez dans l\'univers vibrant de la musique gospel, où la foi, l\'émotion et la voix se rencontrent sur scène.
                 Découvrez les performances inspirantes des chorales et des artistes solo';
                break;
            case 'rap':
                $description='Plongez dans l\'univers dynamique et créatif du rap, où les talents émergents rivalisent de flow et d\'originalité. Découvrez les performances percutantes,
                 les battles épiques et les histoires personnelles qui se cachent derrière chaque texte';
                break;
            case 'mbole':
                $description='Plongez dans l\'univers vibrant et diversifié du mbole, une culture ou un style unique qui rayonne d\'énergie et d\'expression. Découvrez les aspects fascinants de cette culture,
                 des événements emblématiques aux tendances contemporaines qui façonnent son identité.';
                break;
            case 'afro dance':
                $description=' Découvrez l\'énergie explosive et les mouvements dynamiques qui définissent cette danse vibrante et culturelle. Plongez dans les performances captivantes des danseurs,
                 explorez les styles variés allant du traditionnel au contemporain, et vivez l\'excitation des compétitions.';
                break;
        }
        return $description;
    }
}
