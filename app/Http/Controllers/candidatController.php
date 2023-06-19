<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Block\Element\Document;

use function PHPSTORM_META\type;

class candidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periode = DB::table("periode_activite")
            ->where("type", 1)
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('id')
            ->first();

        if (!isset($periode)) {
            DB::table("periode_activite")
                ->insert([
                    "type" => 1,
                    "user_candidat_id" => Auth::user()->id,
                ]);
        }

        $request->validate([
            'type_bac' => 'required',
        ]);
        if ($request->type_preins == 1) {

            if ($request->type_bac == 1) {

                if ($request->annee >= 2010) {
                    $request->validate([
                        'nin_bac' => 'required',
                        'annee' => 'required',
                        'type_preins' => 'required'

                    ]);
                    $bachelier = DB::table("bachelier")->where("NIN", $request->nin_bac)
                        ->where('annee', $request->annee)
                        ->first();

                    if (isset($bachelier)) {
                        $data = DB::table("candidats")
                            ->where("user_candidat_id", Auth::user()->id)
                            ->orWhere("nin", $request->nin_bac)
                            ->first();


                        if (!isset($data)) {
                            DB::table('candidats')->insert([
                                'type_bac' => $request->type_bac,
                                'type_preins_id' => $request->type_preins,
                                'user_candidat_id' => Auth::user()->id,
                                'nin' => $request->nin_bac,
                                'annee' => $request->annee,
                            ]);

                            return redirect("accueil");
                        } else {

                            $messages = "Cette personne a déjà débuté une préinscription";
                        }
                    } else {
                        $messages = "Vous n'avez pas eu le bac cette année";

                        $preins = DB::table("type_preinscription")
                            ->get();
                        return view("mon_bac", compact('messages', 'preins'));
                    }
                } else {

                    $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    if (!isset($data)) {
                        $request->validate([

                            'type_bac' => 'required',
                            'annee' => 'required',
                            'type_preins' => 'required'

                        ]);
                        DB::table('candidats')->insert([
                            'type_bac' => $request->type_bac,
                            'type_preins_id' => $request->type_preins,
                            'user_candidat_id' => Auth::user()->id,
                            'annee' => $request->annee,
                        ]);

                        return redirect("accueil");
                    } else {

                        $messages = "Cette personne a déjà débuté une préinscription";
                        $preins = DB::table("type_preinscription")->get();
                        return view("mon_bac", compact('preins', 'messages'));
                    }
                }
            } else if ($request->type_bac == 2) {

                $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();

                if (!isset($data)) {

                    $request->validate([
                        'type_bac' => 'required',
                        'type_preins' => 'required'
                    ]);


                    DB::table('candidats')->insert([
                        'type_bac' => $request->type_bac,
                        'type_preins_id' => $request->type_preins,
                        'user_candidat_id' => Auth::user()->id,

                    ]);

                    return redirect("accueil");
                } else {

                    $messages = "Cette personne a déjà débuté une préinscription";
                    $preins = DB::table("type_preinscription")->get();
                    return view("mon_bac", compact('preins', 'messages'));
                }
            }
        } else if ($request->type_preins == 2) {
            $date = date("Y");
            $date1 = $date - 2;
            $date2 = $date - 1;
            $date3 = $date1 . '-' . $date2;
            $date4 = $date2 . '-' . $date;

            $inscription = DB::table("inscription")
                ->where("mat_etud", $request->matricule)
                ->where(function ($query) {
                    $date = date("Y");
                    $date1 = $date - 2;
                    $date2 = $date - 1;
                    $date3 = $date1 . '-' . $date2;
                    $date4 = $date2 . '-' . $date;
                    $query->where('Annee', $date3)
                        ->orWhere('Annee', $date4);
                })->first();

            if (isset($inscription)) {
                if ($request->type_bac == 1) {

                    if ($request->annee >= 2010) {
                        $request->validate([
                            'nin_bac' => 'required',
                            'annee' => 'required',
                            'type_preins' => 'required',
                            'matricule' => 'required'


                        ]);
                        $bachelier = DB::table("bachelier")->where("NIN", $request->nin_bac)
                            ->where('annee', $request->annee)
                            ->first();

                        if (isset($bachelier)) {
                            $data = DB::table("candidats")
                                ->where("user_candidat_id", Auth::user()->id)
                                ->orWhere("nin", $request->nin_bac)
                                ->orWhere("matricule", $request->matricule)
                                ->first();

                            if (!isset($data)) {

                                $inscriptions = DB::table("inscription")
                                    ->where("mat_etud", $request->matricule)
                                    ->orderBy('Date_Inscrip', 'desc')
                                    ->first();
                                if ($inscriptions->NIN == $request->nin_bac) {
                                    DB::table('candidats')->insert([
                                        'type_bac' => $request->type_bac,
                                        'matricule' => $request->matricule,
                                        'type_preins_id' => $request->type_preins,
                                        'user_candidat_id' => Auth::user()->id,
                                        'nin' => $request->nin_bac,
                                        'annee' => $request->annee,
                                    ]);

                                    return redirect("accueil");
                                } else {
                                    $preins = DB::table("type_preinscription")->get();
                                    $messages = "Le nin ne correspond pas à ce matricule";
                                    return view("mon_bac", compact("messages", "preins"));
                                }
                            } else {

                                $messages = "Cette personne a déjà débuté une préinscription";
                                $preins = DB::table("type_preinscription")->get();
                                return view("mon_bac", compact('preins', 'messages'));
                            }
                        } else {
                            $messages = "Vous n'avez pas eu le bac cette année";

                            $preins = DB::table("type_preinscription")
                                ->get();
                            return view("mon_bac", compact('messages', 'preins'));
                        }
                    } else {

                        $data = DB::table("candidats")
                            ->where("user_candidat_id", Auth::user()->id)
                            ->orWhere("nin", $request->nin_bac)
                            ->orWhere("matricule", $request->matricule)

                            ->first();
                        if (!isset($data)) {
                            $request->validate([
                                'matricule' => 'required',
                                'type_bac' => 'required',
                                'annee' => 'required',
                                'type_preins' => 'required'

                            ]);

                            $inscriptions = DB::table("inscription")
                                ->where("mat_etud", $request->matricule)
                                ->orderBy('Date_Inscrip', 'desc')
                                ->first();

                            if ($inscriptions->NIN == $request->nin_bac) {
                                DB::table('candidats')->insert([
                                    'matricule' => $request->matricule,
                                    'type_bac' => $request->type_bac,
                                    'type_preins_id' => $request->type_preins,
                                    'user_candidat_id' => Auth::user()->id,
                                    'annee' => $request->annee,
                                ]);

                                return redirect("accueil");
                            } else {
                                $preins = DB::table("type_preinscription")->get();
                                $messages = "Le nin ne correspond pas à ce matricule";
                                return view("mon_bac", compact("messages", "preins"));
                            }
                        } else {

                            $messages = "Cette personne a déjà débuté une préinscription";
                            $preins = DB::table("type_preinscription")->get();
                            return view("mon_bac", compact('preins', 'messages'));
                        }
                    }
                } else if ($request->type_bac == 2) {

                    $data = DB::table("candidats")
                        ->where("user_candidat_id", Auth::user()->id)
                        ->orWhere("matricule", $request->matricule)

                        ->first();
                    if (!isset($data)) {
                        $request->validate([
                            'type_bac' => 'required',
                            'type_preins' => 'required',
                        ]);
                        if ($request->type_preins == 1) {
                            DB::table('candidats')->insert([
                                'type_bac' => $request->type_bac,
                                'type_preins_id' => $request->type_preins,
                                'user_candidat_id' => Auth::user()->id,


                            ]);

                            return redirect("accueil");
                        } else {
                            DB::table('candidats')->insert([

                                'type_bac' => $request->type_bac,
                                'type_preins_id' => $request->type_preins,
                                'user_candidat_id' => Auth::user()->id,
                                'matricule' => $request->matricule

                            ]);

                            return redirect("accueil");
                        }
                    } else {

                        $messages = "Cette personne a déjà débuté une préinscription";
                        $preins = DB::table("type_preinscription")->get();
                        return view("mon_bac", compact('preins', 'messages'));
                    }
                }
            } else {
                $preins = DB::table("type_preinscription")->get();
                $messages = "Vous ne pouvez pas faire un transfert";
                return view("mon_bac", compact("messages", "preins"));
            }
        } else if ($request->type_preins == 3) {
            $date = date("Y");
            $date1 = $date - 2;
            $date2 = $date - 1;
            $date3 = $date1 . '-' . $date2;
            $date4 = $date2 . '-' . $date;


            $inscription = DB::table("inscription")
                ->where("mat_etud", $request->matricule)
                ->whereIn("Annee", [$date3, $date4])->first();

            if (!isset($inscription)) {
                if ($request->type_bac == 1) {

                    if ($request->annee >= 2010) {
                        $request->validate([
                            'nin_bac' => 'required',
                            'annee' => 'required',
                            'type_preins' => 'required',
                            'matricule' => 'required'


                        ]);
                        $bachelier = DB::table("bachelier")->where("NIN", $request->nin_bac)
                            ->where('annee', $request->annee)
                            ->first();

                        if (isset($bachelier)) {
                            $data = DB::table("candidats")
                                ->where("user_candidat_id", Auth::user()->id)
                                ->orWhere("nin", $request->nin_bac)
                                ->orWhere("matricule", $request->matricule)
                                ->first();

                            if (!isset($data)) {



                                $inscriptions = DB::table("inscription")
                                    ->where("mat_etud", $request->matricule)
                                    ->orderBy('Date_Inscrip', 'desc')
                                    ->first();

                                if ($inscriptions->NIN == $request->nin_bac) {
                                    DB::table('candidats')->insert([
                                        'type_bac' => $request->type_bac,
                                        'matricule' => $request->matricule,
                                        'type_preins_id' => $request->type_preins,
                                        'user_candidat_id' => Auth::user()->id,
                                        'nin' => $request->nin_bac,
                                        'annee' => $request->annee,
                                    ]);

                                    return redirect("accueil");
                                } else {
                                    $preins = DB::table("type_preinscription")->get();
                                    $messages = "Le nin ne correspond pas à ce matricule";
                                    return view("mon_bac", compact("messages", "preins"));
                                }
                            } else {

                                $messages = "Cette personne a déjà débuté une préinscription";
                                $preins = DB::table("type_preinscription")->get();
                                return view("mon_bac", compact('preins', 'messages'));
                            }
                        } else {
                            $messages = "Vous n'avez pas eu le bac cette année";


                            $preins = DB::table("type_preinscription")
                                ->get();
                            return view("mon_bac", compact('messages', 'preins'));
                        }
                    } else {

                        $data = DB::table("candidats")
                            ->where("user_candidat_id", Auth::user()->id)
                            ->orWhere("nin", $request->nin_bac)
                            ->orWhere("matricule", $request->matricule)

                            ->first();
                        if (!isset($data)) {
                            $request->validate([
                                'matricule' => 'required',
                                'type_bac' => 'required',
                                'annee' => 'required',
                                'type_preins' => 'required'

                            ]);

                            $inscriptions = DB::table("inscription")
                                ->where("mat_etud", $request->matricule)
                                ->orderBy('Date_Inscrip', 'desc')
                                ->first();

                            if ($inscriptions->NIN == $request->nin_bac) {
                                DB::table('candidats')->insert([
                                    'matricule' => $request->matricule,
                                    'type_bac' => $request->type_bac,
                                    'type_preins_id' => $request->type_preins,
                                    'user_candidat_id' => Auth::user()->id,
                                    'annee' => $request->annee,
                                ]);

                                return redirect("accueil");
                            } else {
                                $preins = DB::table("type_preinscription")->get();
                                $messages = "Le nin ne correspond pas à ce matricule";
                                return view("mon_bac", compact("messages", "preins"));
                            }
                        } else {


                            $messages = "Cette personne a déjà débuté une préinscription";
                            $preins = DB::table("type_preinscription")->get();
                            return view("mon_bac", compact('preins', 'messages'));
                        }
                    }
                } else if ($request->type_bac == 2) {

                    $data = DB::table("candidats")
                        ->where("user_candidat_id", Auth::user()->id)
                        ->first();

                    if (!isset($data)) {

                        $request->validate([
                            'type_bac' => 'required',
                            'type_preins' => 'required',

                        ]);

                        if ($request->type_preins == 1) {
                            DB::table('candidats')->insert([

                                'type_bac' => $request->type_bac,
                                'type_preins_id' => $request->type_preins,
                                'user_candidat_id' => Auth::user()->id,


                            ]);

                            return redirect("accueil");
                        } else {
                            DB::table('candidats')->insert([

                                'type_bac' => $request->type_bac,
                                'type_preins_id' => $request->type_preins,
                                'user_candidat_id' => Auth::user()->id,
                                'matricule' => $request->matricule
                            ]);

                            return redirect("accueil");
                        }
                    } else {

                        $messages = "Vpous avez  déjà débuté une préinscription";
                        $preins = DB::table("type_preinscription")->get();
                        return view("mon_bac", compact('preins', 'messages'));
                    }
                }
            } else {
                $preins = DB::table("type_preinscription")->get();
                $messages = "Vous ne pouvez pas faire une reprise";
                return view("mon_bac", compact("messages", 'preins'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function updates(Request $request)
    {
        $update = DB::table('candidat')
            ->where('id', 1)
            ->update(['choix' => $request->departement]);

        return response()->json($update);
    }

    public function accueil()
    {
        $ch = curl_init();
        // define options
        $optArray = array(
            CURLOPT_URL => 'https://26900.tagpay.fr/online/online.php?merchantid=2274832632922162',
            CURLOPT_RETURNTRANSFER => true
        );

        // apply those options
        curl_setopt_array($ch, $optArray);

        // execute request and get response
        $result = curl_exec($ch);

        // also get the error and response code
        $errors = curl_error($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        // var_dump($errors);
        $sessionId = substr($result, 3);

        $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();

        $message = DB::table("message")
            ->where("num_recu", $data->num_recu)
            ->where("statut", 1)
            ->first();
        if (isset($data)) {
            if (isset($data->id_type)) {
                $recu = DB::table("type_recu")
                    ->where("id_type", $data->id_type)

                    ->first();
                if (isset($data->nin)) {
                    $bachelier = DB::table("bachelier")->where("NIN", $data->nin)->where("annee", $data->annee)->first();
                    $annees = DB::table("annee")->get();
                    $pays = DB::table('pays')->get();
                    $type_recu = DB::table('type_recu')
                        ->where("type_preins_id", $data->type_preins_id)
                        ->get();
                    $preins = DB::table("type_preinscription")
                        ->where("id", $data->type_preins_id)
                        ->first();
                    return view('index', compact('data', 'annees', 'bachelier', 'pays', 'type_recu', 'recu', 'preins', 'sessionId', 'message'));
                } else {
                    $annees = DB::table("annee")->get();
                    $pays = DB::table('pays')->get();
                    $type_recu = DB::table('type_recu')
                        ->where("type_preins_id", $data->type_preins_id)
                        ->get();
                    $preins = DB::table("type_preinscription")
                        ->where("id", $data->type_preins_id)
                        ->first();
                    $recu = DB::table("type_recu")->where("id_type", $data->id_type)->first();
                    return view('index', compact('data', 'annees', 'pays', 'type_recu', 'recu', 'preins', 'sessionId', 'message'));
                }
            } else {

                if (isset($data->nin)) {
                    $bachelier = DB::table("bachelier")->where("NIN", $data->nin)->where("annee", $data->annee)->first();
                    $annees = DB::table("annee")->get();
                    $pays = DB::table('pays')->get();
                    $type_recu = DB::table('type_recu')
                        ->where("type_preins_id", $data->type_preins_id)
                        ->get();
                    $preins = DB::table("type_preinscription")
                        ->where("id", $data->type_preins_id)
                        ->first();
                    return view('index', compact('data', 'annees', 'bachelier', 'pays', 'type_recu', 'preins', 'sessionId', 'message'));
                } else {
                    $annees = DB::table("annee")->get();
                    $pays = DB::table('pays')->get();
                    $type_recu = DB::table('type_recu')
                        ->where("type_preins_id", $data->type_preins_id)
                        ->get();
                    $preins = DB::table("type_preinscription")
                        ->where("id", $data->type_preins_id)
                        ->first();

                    return view('index', compact('data', 'annees', 'pays', 'type_recu', 'preins', 'sessionId', 'message'));
                }
            }
        } else {
            return redirect('mon_bac');
        }
    }
    public function candidat_info(Request $request)
    {
        $ch = curl_init();
        // define options
        $optArray = array(
            CURLOPT_URL => 'https://26900.tagpay.fr/online/online.php?merchantid=2274832632922162',
            CURLOPT_RETURNTRANSFER => true
        );

        // apply those options
        curl_setopt_array($ch, $optArray);

        // execute request and get response
        $result = curl_exec($ch);

        // also get the error and response code
        $errors = curl_error($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        // var_dump($errors);
        $sessionId = substr($result, 3);
        $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $datas = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $bachelier = DB::table("bachelier")->where("NIN", $data->nin)->where("annee", $data->annee)->first();
        $type_recu = DB::table('type_recu');
        $pays = DB::table('pays')->get();
        $type_recu = DB::table('type_recu')
            ->where("type_preins_id", $data->type_preins_id)
            ->get();

        if ($datas->type_bac == 1 && $datas->nin != NULL) {
            $data = DB::table("bachelier")->where("NIN", $datas->nin)->where("annee", $datas->annee)->first();


            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:1048',
                'type_preinscription' => 'required',
                'sexe' => 'required',
                'adresse' => 'required',
                'pays' => 'required',
                'telephone' => 'required',

            ]);

            $imageName = $data->NIN . '.' . $request->image->extension();
            $request->image->move(public_path('photo'), $imageName);

            DB::table('candidats')
                ->where('user_candidat_id', Auth::user()->id)
                ->update([
                    'id_type' => $request->type_preinscription,
                    'statut' => '1',
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'date_naiss' => $data->Date_nais,
                    'lieu_naiss' => $data->Lieu_nais,
                    'sexe' => $request->sexe,
                    'adresse_cand' => $request->adresse,
                    'pays' => $request->pays,
                    'tel_mobile' => $request->telephone,
                    'serie' => $data->Serie,
                    'mention' => $data->Mention,
                    'centre' => $data->Centre,
                    'num_attest' => $data->Num_Attest,
                    'photo' => $imageName,
                ]);

            return redirect("accueil");
        } else if ($datas->type_bac == 1 && $datas->nin == NULL) {

            $data = DB::table("bachelier")->where("NIN", $datas->nin)->where("annee", $datas->annee)->first();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:1048',
                'type_preinscription' => 'required',
                'nin' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'date_naissance' => 'required',
                'lieu_naissance' => 'required',
                'sexe' => 'required',
                'adresse' => 'required',
                'pays' => 'required',
                'telephone' => 'required',
                'serie' => 'required',
                'mention' => 'required',
                'centre' => 'required',
                'num_attest' => 'required',
                'image' => 'required',


            ]);


            $data = DB::table("candidats")->where("nin", $request->nin)->first();
            if (!isset($data)) {

                $imageName = $request->nin . '.' . $request->image->extension();
                $request->image->move(public_path('photo'), $imageName);
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->type_preinscription,
                        'statut' => '1',
                        'nin' => $request->nin,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $request->date_naissance,
                        'lieu_naiss' => $request->lieu_naissance,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $request->serie,
                        'mention' => $request->mention,
                        'centre' => $request->centre,
                        'num_attest' => $request->num_attest,
                        'photo' => $imageName,

                    ]);
                return redirect("accueil");
            } else {

                $messages = "Cette personne a déjà débuté une préinscription";
                $annees = DB::table("annee")->get();
                $pays = DB::table('pays')->get();
                $type_recu = DB::table('type_recu')
                    ->where("type_preins_id", $data->type_preins_id)
                    ->get();
                $preins = DB::table("type_preinscription")
                    ->where("id", $data->type_preins_id)
                    ->first();
                $recu = DB::table("type_recu")->where("id_type", $data->id_type)->first();


                return view('index', compact('data', 'annees', 'pays', 'type_recu', 'preins', 'sessionId', 'messages', 'recu'));
            }
        } else if ($datas->type_bac == 2) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:1048',
                'type_preinscription' => 'required',
                'nin' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'date_naissance' => 'required',
                'lieu_naissance' => 'required',
                'sexe' => 'required',
                'adresse' => 'required',
                'pays' => 'required',
                'telephone' => 'required',
                'serie' => 'required',
                'mention' => 'required',
                'centre' => 'required',
                'num_attest' => 'required',
                'image' => 'required',
                'annees' => 'required',
            ]);


            $das = DB::table("candidats")->where("nin", $request->nin)->first();
            if (!isset($das)) {


                $imageName = $request->nin . '.' . $request->image->extension();
                $request->image->move(public_path('photo'), $imageName);
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->type_preinscription,
                        'statut' => '1',
                        'nin' => $request->nin,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $request->date_naissance,
                        'lieu_naiss' => $request->lieu_naissance,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $request->serie,
                        'mention' => $request->mention,
                        'centre' => $request->centre,
                        'num_attest' => $request->num_attest,
                        'annee' => $request->annees,
                        'photo' => $imageName,
                    ]);

                return redirect("accueil");
            } else {
                $messages = "Cette personne a déjà débuté une préinscription";

                $annees = DB::table("annee")->get();
                $pays = DB::table('pays')->get();
                $type_recu = DB::table('type_recu')
                    ->where("type_preins_id", $data->type_preins_id)
                    ->get();
                $preins = DB::table("type_preinscription")
                    ->where("id", $data->type_preins_id)
                    ->first();
                $recu = DB::table("type_recu")->where("id_type", $data->id_type)->first();

                return view('index', compact('data', 'annees', 'pays', 'type_recu', 'preins', 'sessionId', 'messages', 'recu'));
            }
        }
    }

    public function candidat_filiere(Request $request)
    {
        // if($request->id==1)
        // {
        $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $faculte = DB::table("faculte")->where("concours", 0)->get();
        $facultes = DB::table("faculte")->get();


        return response()->json([
            'data' => $data,
            'faculte' => $faculte,
            'facultes' => $facultes
        ]);

        // }
    }

    public function getDepartement1(Request $request)
    {
        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        if ($candidat->id_type == 1) {



            $departement1 = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                ->where("concours", 0)
                ->where('disposition.code_niv', 'N1')
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante1)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement1);
        }
    }

    public function getDepartement2(Request $request)
    {
        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        if ($candidat->id_type == 1) {
            // if($candidat->serie==)
            // $departement1=DB::table("departement")
            // ->join("disposition","departement.code_depart","disposition.code_depart")
            // ->where("disposition.statut",1)
            // ->where("departement.statut",1)
            // ->where("disposition.code_niv","N1")
            // ->where("departement.serie",'LIKE','%'.$candidat->serie.'%')
            // ->WHERE("code_facult",$request->composante1)
            // ->pluck("design_depart", "departement.code_depart");
            // return response()->json($departement1);



            $departement2 = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                ->where("concours", 0)
                ->where('disposition.code_niv', 'N1')
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante2)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement2);
        }
    }
    public function getDepartement3(Request $request)
    {
        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        if ($candidat->id_type == 1) {
            $departement3 = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                // ->where('disposition.code_niv','N1')
                ->where(function ($query) {
                    $query->where('disposition.code_niv', 'N1')
                        ->orwhere('disposition.code_niv', 'P1');
                })
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante3)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement3);
        }
    }

    public function add_fili(Request $request)
    {
        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        if ($candidat->id_type == 1) {
            $request->validate([
                'departement1' => 'required',
                'departement2' => 'required',
                'departement3' => 'required'
            ]);

            $update = DB::table('candidats')
                ->where('user_candidat_id', Auth::user()->id)
                ->update([
                    'statut' => 2,
                    'choix1' => $request->departement1,
                    'choix2' => $request->departement2,
                    'choix3' => $request->departement3
                ]);

            return response()->json($update);
        } else {
            $request->validate([
                'departement' => 'required',

            ]);

            $update = DB::table('candidats')
                ->where('user_candidat_id', Auth::user()->id)
                ->update([
                    'statut' => 2,
                    'choix1' => $request->departement,
                ]);

            return response()->json($update);
        }
    }
    public function getDepartement(Request $request)
    {
        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        if ($candidat->id_type == 41 || $candidat->id_type == 51) {
            $departement = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                // ->where('disposition.code_niv','N1')
                ->where(function ($query) {
                    $query->where('disposition.code_niv', 'N1')
                        ->orwhere('disposition.code_niv', 'P1');
                })
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement);
        } elseif ($candidat->id_type == 2 || $candidat->id_type == 42 || $candidat->id_type == 52) {
            $departement = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                // ->where('disposition.code_niv','N1')
                ->where(function ($query) {
                    $query->where('disposition.code_niv', 'N2')
                        ->orwhere('disposition.code_niv', 'P2');
                })
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement);
        } elseif ($candidat->id_type == 3 || $candidat->id_type == 43 || $candidat->id_type == 53) {
            $departement = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                // ->where('disposition.code_niv','N1')
                ->where(function ($query) {
                    $query->where('disposition.code_niv', 'N3')
                        ->orwhere('disposition.code_niv', 'P3');
                })
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement);
        } elseif ($candidat->id_type == 6 ||  $candidat->id_type == 56) {
            $departement = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                // ->where('disposition.code_niv','N1')
                ->where(function ($query) {
                    $query->where('disposition.code_niv', 'N4')
                        ->orwhere('disposition.code_niv', 'P4');
                })
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement);
        } elseif ($candidat->id_type == 7 ||  $candidat->id_type == 57) {
            $departement = DB::table('departement')
                ->join('disposition', 'departement.code_depart', 'disposition.code_depart')
                ->where('disposition.statut', 1)
                ->where('departement.statut', 1)
                // ->where('disposition.code_niv','N1')
                ->where(function ($query) {
                    $query->where('disposition.code_niv', 'N5')
                        ->orwhere('disposition.code_niv', 'P5');
                })
                ->where(function ($query) {
                    $candidats = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
                    $query->where('departement.serie', 'LIKE', '%' . $candidats->serie . '%')
                        ->orWhere('departement.serie', '=', 'all');
                })
                ->WHERE("code_facult", $request->composante)
                ->pluck("design_depart", "departement.code_depart");
            return response()->json($departement);
        }
    }

    public function info_fili()
    {
        $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        if ($data->id_type == 1) {
            $departement1 = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $data->choix1)

                ->first();

            $departement2 = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $data->choix2)
                ->first();

            $departement3 = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $data->choix3)
                ->first();



            return response()->json([
                'data' => $data,
                'departement1' => $departement1,
                'departement2' => $departement2,
                'departement3' => $departement3

            ]);
        } else {
            $departement = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $data->choix1)
                ->first();


            return response()->json([
                'data' => $data,
                'departement' => $departement
            ]);
        }
    }

    public function showDoc()
    {
        $document = DB::table("documents")
            ->where('user_candidat_id', Auth::user()->id)
            ->first();
        if (isset($document)) {
            $candidat = DB::table("candidats")
                ->join('documents', 'documents.id', 'candidats.document_id')
                ->where("candidats.user_candidat_id", Auth::user()->id)
                ->select("candidats.*", 'documents.document as document')
                ->first();

            return response()->json($candidat);
        } else {
            $candidat = DB::table("candidats")
                ->where("user_candidat_id", Auth::user()->id)
                ->first();

            return response()->json($candidat);
        }
    }

    public function add_doc(Request $request)
    {
        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $doc = DB::table("documents")->where("user_candidat_id", Auth::user()->id)->first();
        if (!isset($doc)) {
            $request->validate([
                'document' => 'required|mimes:pdf|max:2048',
            ]);


            $document = $candidat->nin . '.' . $request->document->extension();

            $request->document->move(public_path('document'), $document);

            DB::table('documents')->insert([
                "document" => $document,
                "user_candidat_id" => Auth::user()->id
            ]);

            $docs = DB::table("documents")->where("user_candidat_id", Auth::user()->id)->first();
            $update = DB::table('candidats')
                ->where('user_candidat_id', Auth::user()->id)
                ->update([
                    'document_id' => $docs->id,
                    'statut' => 3
                ]);

            return response()->json();
        } else {
            $message = "Vous avez dejà mis un document";
            return response()->json();
        }
    }

    public function getInfo()
    {
        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $periode = DB::table('periode_activite')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('id')->first();
        Cookie::queue('user_candidat_id', $periode->user_candidat_id);

        $user_candidat_id = Cookie::get('user_candidat_id');
        $docs = DB::table("documents")->where("user_candidat_id", Auth::user()->id)->first();
        if ($candidat->id_type == 1) {
            $departement1 = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $candidat->choix1)
                ->first();

            $departement2 = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $candidat->choix2)
                ->first();

            $departement3 = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $candidat->choix3)
                ->first();
            $recu = DB::table("type_recu")
                ->where("id_type", $candidat->id_type)
                ->first();

            return response()->json([
                'candidat' => $candidat,
                'departement1' => $departement1,
                'departement2' => $departement2,
                'departement3' => $departement3,
                'docs' => $docs,
                'recu' => $recu,
                'user_candidat_id' => $user_candidat_id

            ]);
        } else {
            $departement = DB::table("departement")
                ->join("faculte", "departement.code_facult", "faculte.code_facult")
                ->select("faculte.*", "departement.*")
                ->where("code_depart", $candidat->choix1)
                ->first();

            $recu = DB::table("type_recu")
                ->where("id_type", $candidat->id_type)
                ->first();

            return response()->json([
                'candidat' => $candidat,
                'departement' => $departement,
                'docs' => $docs,
                'recu' => $recu,
                'user_candidat_id' => $user_candidat_id


            ]);
        }
    }

    public function mon_bac()
    {
        $datas = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();

        if (isset($datas)) {
            return redirect("accueil");
        } else {

            $date = date("Y");
            $date1 = $date - 2;
            $date2 = $date - 1;
            $date3 = $date1 . '-' . $date2;
            $date4 = $date2 . '-' . $date;
            $preins = DB::table("type_preinscription")->get();
            return view("mon_bac", compact('preins', 'date3', 'date4'));
        }
    }

    public function type(Request $request)
    {
        if ($request->type == 1) {
            return redirect()->intended('/mon_bac');
        } else {
            return redirect()->intended('/home');
        }
    }

    public function notification()
    {
        if ($_GET['status'] == "OK") {

            $periode = DB::table('periode_activite')
                ->where("user_candidat_id", $_GET['purchaseref'])
                ->orderByDesc('id')->first();

            if ($periode->type == 1) {


                // if ($_GET['status'] == "OK") {
                $recu = $_GET['purchaseref'];
                $candidat = DB::table("candidats")
                    ->where("user_candidat_id", $_GET['purchaseref'])
                    ->first();
                $ref = DB::table("holo")
                    ->where("nin", $candidat->nin)
                    ->get();

                if ($ref->count() == 0) {
                    DB::table("holo")->insert([
                        "reference" => $_GET['paymentref'],
                        "nin" => $candidat->nin
                    ]);

                    $refs = DB::table("holo")
                        ->where("nin", $candidat->nin)
                        ->first();

                    $update = DB::table('candidats')
                        ->where("num_recu", $candidat->num_recu)
                        ->update([
                            'statut' => 4,
                            'reference_id' => $refs->id,
                        ]);
                }
                // }
            } else if ($periode->type == 2) {
                // if ($_GET['status'] == "OK") {

                // $nine=substr($_GET['purchaseref'], 1);
                $annee = DB::table('annee')->orderByDesc("id_annee")->first();
                $num_auto = DB::table('post_inscription')->where("user_candidat_id", $_GET['purchaseref'])->where("Annee", $annee->Annee)->orderByDesc("num_auto")->first();
                // $nine = Cookie::get('nin');


                $quitus = DB::table('quitus')->where("num_auto", $num_auto->num_auto)->where("Annee", $annee->Annee)->where("trans_udc", $_GET['paymentref'])->get();
                $poste = DB::table('post_inscription')->where("num_auto", $num_auto->num_auto)->where("Annee", $annee->Annee)->orderByDesc("num_auto")->first();

                if ($quitus->count() == 0) {
                    $annees = DB::table('quitus')->where("Annee", $annee->Annee)->get();
                    if ($annees->count() == 0) {
                        $ins_quitus = DB::table("quitus")->insert([
                            "num_quitus" => 1,
                            "num_auto" => $poste->num_auto,
                            "nin" => $poste->nin,
                            "trans_udc" => $_GET['paymentref'],
                            "Annee" => $annee->Annee,
                        ]);

                        $nin = Cookie::get('nin');

                        $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->where("Annee", $annee->Annee)->first();
                        if (!empty($post->matricule)) {

                            $etudiants = DB::table("etudiant")->where("mat_etud", $post->matricule)->first();
                            $inscription = DB::table("inscription")->where("mat_etud", $etudiants->mat_etud)->where('Annee', $annee->Annee)->get();
                            if ($inscription->count() == 0) {
                                $admission = DB::table('admission')->where('matricule', $etudiants->mat_etud)->get();
                                $admissions = DB::table('admission')->where('matricule', $etudiants->mat_etud)->first();

                                if ($admission->count() == 0) {
                                    $resultat = "ajourné";
                                    $session = "";
                                    $mention = "";
                                } else {
                                    $resultat = "admis";
                                    $session = $admissions->session;
                                    $mention = $admissions->mention;
                                }

                                $dateJ = date('Y-m-d');
                                $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->where("Annee", $annee->Annee)->first();
                                $etud = DB::table('etudiant')
                                    ->where("mat_etud", $post->matricule)
                                    ->update(['NIN' => $post->nin, "Tel_Etud" => $post->tel_mobile, "date_j" => $dateJ, 'profession' => $post->pro]);
                                $ins = $post->num_auto . "/" . $annee->Annee;
                                $inscri = DB::table("inscription")->insert([
                                    "Num_Inscrip" => $ins,
                                    "NIN" => $post->nin,
                                    "Date_Inscrip" => $dateJ,
                                    "Mt_Regl_Inscrip" => $post->droit,
                                    "code_depart" => $post->code_depart,
                                    "code_niv" => $post->code_niv,
                                    "Annee" => $post->Annee,
                                    "mat_etud" => $post->matricule,
                                    "Parour_Etud" => "Ancien",
                                    "Resultat" => $resultat,
                                    "Session" => $session,
                                    "Mention" => $mention,
                                ]);

                                $composante = DB::table("faculte")->where("code_facult", $post->code_facult)->first();
                                $departement = DB::table("departement")->where("code_depart", $post->code_depart)->first();
                                $niveau = DB::table("niveau")->where("code_niv", $post->code_niv)->first();

                                $data = DB::table('inscription')
                                    ->join('etudiant', 'inscription.mat_etud', '=', 'etudiant.mat_etud')
                                    ->select('inscription.*', 'etudiant.*')
                                    ->where("inscription.mat_etud", $post->matricule)->orderByDesc("Annee")->first();

                                $datas = DB::table('inscription')
                                    ->join('niveau', 'inscription.code_niv', '=', 'niveau.code_niv')
                                    ->join('departement', 'inscription.code_depart', '=', 'departement.code_depart')
                                    ->join('faculte', 'departement.code_facult', '=', 'faculte.code_facult')
                                    ->select('inscription.*', 'niveau.*', 'departement.*', 'faculte.*')
                                    ->where("inscription.mat_etud", $post->matricule)->orderByDesc("Annee")->get();

                                $message = "success";
                                return view("fiche", compact("message", 'data', "post", 'datas'));
                            } else {
                                $message = "vous êtes deja inscris cette année";
                                $nin = Cookie::get('nin');
                                $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->first();
                                return view("success", compact("message", 'post'));
                            }
                        } else {

                            $etudiants = DB::table("etudiant")->where("mat_etud", $post->matricule)->first();
                            $etud = DB::table("etudiant")->orderByDesc("id")->first();
                            $mat = $etud->mat_etud;
                            $dernier = intval($etud->mat_etud);
                            $dernier++;
                            $mat = (string) $dernier;
                            $candidat = DB::table("candidats")->where("nin",  $poste->nin)->first();
                            // $admission=DB::table('admission')->where('matricule',$etudiants->mat_etud)->get();
                            // $admissions=DB::table('admission')->where('matricule',$etudiants->mat_etud)->first();



                            $date = date('Y-m-d H:i:s');
                            // $dateJ=date('Y-m-d');

                            $dateJ = date('Y-m-d');
                            $ins = $post->num_auto . "/" . $annee->Annee;
                            $et = DB::table("etudiant")->where('nin', $candidat->nin)->get();
                            if ($et->count() == 0) {
                                $inscriptions = DB::table("etudiant")->insert([
                                    'mat_etud' => $mat,
                                    'nin' => $candidat->nin,
                                    'nom' => $candidat->nom,
                                    'prenom' => $candidat->prenom,
                                    'date_naiss' => $candidat->date_naiss,
                                    'lieu_naiss' => $candidat->lieu_naiss,
                                    'nationalite' => $candidat->nationalite,
                                    'sexe' => $candidat->sexe,
                                    'Adr_Etud' => $candidat->adresse_cand,
                                    'Tel_Etud' => $candidat->tel_mobile,
                                    'ile' => $candidat->ile,
                                    'situat_familliale' => $candidat->situation,
                                    'nbr_enfants' => $candidat->Nbr_enfants,
                                    'serie_bac' => $candidat->serie,
                                    'mention_bac' => $candidat->mention,
                                    'annee_bac' => $candidat->annee,
                                    'lieu_obt_bac' => $candidat->centre,
                                    'eqv_bac' => $candidat->equiv,
                                    'code_niv' => $post->code_niv,
                                    'code_depart' => $post->code_depart,
                                    'Num_preinscr' => $candidat->num_recu,
                                    'Date_preinscr' => $candidat->datePrescript,
                                    'An_Univ' => $post->Annee,
                                    'date_j' => $date,
                                    'profession' => $candidat->pro
                                ]);
                            }
                            $ins = $post->num_auto . "/" . $annee->Annee;
                            $inscri = DB::table("inscription")->insert([
                                "Num_Inscrip" => $ins,
                                "NIN" => $post->nin,
                                "Date_Inscrip" => $dateJ,
                                "Mt_Regl_Inscrip" => $post->droit,
                                // "Date_Reg_Inscrip"=>$post->nin,
                                "code_depart" => $post->code_depart,
                                "code_niv" => $post->code_niv,
                                "Annee" => $post->Annee,
                                "mat_etud" => $mat,
                                "Parour_Etud" => "Nouveau",
                                "Resultat" => "",
                                "Session" => "",
                                "Mention" => "",
                            ]);

                            $composante = DB::table("faculte")->where("code_facult", $post->code_facult)->first();
                            $departement = DB::table("departement")->where("code_depart", $post->code_depart)->first();
                            $niveau = DB::table("niveau")->where("code_niv", $post->code_niv)->first();
                            $et = DB::table("etudiant")->where("NIN", $post->nin)->first();
                            // $carte=DB::table('carte')->insert([
                            //     "matricule"=>$et->mat_etud,
                            //     "nom"=>$post->nom,
                            //     "prenom"=>$post->prenom,
                            //     "date_nais"=>$post->date_naiss,
                            //     "lieu_nais"=>$post->lieu_naiss,
                            //     "faculte"=>$composante->design_facult,
                            //     "departement"=>$departement->design_depart,
                            //     "niveau"=>$niveau->intit_niv,
                            //     "annee"=>$post->Annee,
                            //     "Photo"=>$et->mat_etud,
                            // ]);

                            $data = DB::table('inscription')
                                ->join('etudiant', 'inscription.mat_etud', '=', 'etudiant.mat_etud')
                                ->select('inscription.*', 'etudiant.*')
                                ->where("inscription.mat_etud", $et->mat_etud)->orderByDesc("Annee")->first();

                            $datas = DB::table('inscription')
                                ->join('niveau', 'inscription.code_niv', '=', 'niveau.code_niv')
                                ->join('departement', 'inscription.code_depart', '=', 'departement.code_depart')
                                ->join('faculte', 'departement.code_facult', '=', 'faculte.code_facult')
                                ->select('inscription.*', 'niveau.*', 'departement.*', 'faculte.*')
                                ->where("inscription.mat_etud", $et->mat_etud)->orderByDesc("Annee")->get();
                            $message = "Matricule Ajouté avec succés!";
                            return view("fiche", compact("message", "post", "data", 'datas'));
                        }
                    } else {
                        $nin = Cookie::get('nin');
                        $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->where("Annee", $annee->Annee)->first();
                        $quitus_in = DB::table("quitus")->where("Annee", $annee->Annee)->orderByDesc("num_quitus")->first();
                        $num = intval($quitus_in->num_quitus + 1);
                        $ins_quitus = DB::table("quitus")->insert([
                            "num_quitus" => $num,
                            "num_auto" => $poste->num_auto,
                            "nin" => $poste->nin,
                            "trans_udc" => $_GET['paymentref'],
                            "trans_mutuelle" => $_GET['reason'],
                            "traitant_quitus" => $_GET['error'],
                            "Annee" => $annee->Annee,
                        ]);
                        $nin = Cookie::get('nin');
                        $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->where("Annee", $annee->Annee)->first();
                        if (!empty($post->matricule)) {

                            $etudiants = DB::table("etudiant")->where("mat_etud", $post->matricule)->first();
                            $inscription = DB::table("inscription")->where("mat_etud", $etudiants->mat_etud)->where('Annee', $annee->Annee)->get();
                            if ($inscription->count() == 0) {
                                $admission = DB::table('admission')->where('matricule', $etudiants->mat_etud)->get();
                                $admissions = DB::table('admission')->where('matricule', $etudiants->mat_etud)->first();

                                if ($admission->count() == 0) {
                                    $resultat = "ajourné";
                                    $session = "";
                                    $mention = "";
                                } else {
                                    $resultat = "admis";
                                    $session = $admissions->session;
                                    $mention = $admissions->mention;
                                }

                                $dateJ = date('Y-m-d');
                                $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->where("Annee", $annee->Annee)->first();
                                $etud = DB::table('etudiant')
                                    ->where("mat_etud", $post->matricule)
                                    ->update(['NIN' => $post->nin, "Tel_Etud" => $post->tel_mobile, "date_j" => $dateJ, 'profession' => $post->pro]);
                                $ins = $post->num_auto . "/" . $annee->Annee;
                                $inscri = DB::table("inscription")->insert([
                                    "Num_Inscrip" => $ins,
                                    "NIN" => $post->nin,
                                    "Date_Inscrip" => $dateJ,
                                    "Mt_Regl_Inscrip" => $post->droit,
                                    // "Date_Reg_Inscrip"=>$post->nin,
                                    "code_depart" => $post->code_depart,
                                    "code_niv" => $post->code_niv,
                                    "Annee" => $post->Annee,
                                    "mat_etud" => $post->matricule,
                                    "Parour_Etud" => "Ancien",
                                    "Resultat" => $resultat,
                                    "Session" => $session,
                                    "Mention" => $mention,
                                ]);

                                $composante = DB::table("faculte")->where("code_facult", $post->code_facult)->first();
                                $departement = DB::table("departement")->where("code_depart", $post->code_depart)->first();
                                $niveau = DB::table("niveau")->where("code_niv", $post->code_niv)->first();
                                // $carte=DB::table('carte')->insert([
                                //     "matricule"=>$post->matricule,
                                //     "nom"=>$post->nom,
                                //     "prenom"=>$post->prenom,
                                //     "date_nais"=>$post->date_naiss,
                                //     "lieu_nais"=>$post->lieu_naiss,
                                //     "faculte"=>$composante->design_facult,
                                //     "departement"=>$departement->design_depart,
                                //     "niveau"=>$niveau->intit_niv,
                                //     "annee"=>$post->Annee,
                                //     "Photo"=>$post->matricule,
                                // ]);
                                // $nin=Cookie::get('nin');
                                // $post=DB::table("post_inscription")->where("nin",$nin)->where("Annee",$annee)->first();
                                $data = DB::table('inscription')
                                    ->join('etudiant', 'inscription.mat_etud', '=', 'etudiant.mat_etud')
                                    ->select('inscription.*', 'etudiant.*')
                                    ->where("inscription.mat_etud", $post->matricule)->orderByDesc("Annee")->first();

                                $datas = DB::table('inscription')
                                    ->join('niveau', 'inscription.code_niv', '=', 'niveau.code_niv')
                                    ->join('departement', 'inscription.code_depart', '=', 'departement.code_depart')
                                    ->join('faculte', 'departement.code_facult', '=', 'faculte.code_facult')
                                    ->select('inscription.*', 'niveau.*', 'departement.*', 'faculte.*')
                                    ->where("inscription.mat_etud", $post->matricule)->orderByDesc("Annee")->get();
                                $message = "success";
                                return view("fiche", compact("message", 'post', 'data', 'datas'));
                            } else {
                                $message = "vous etes deja inscris cette année";
                                $nin = Cookie::get('nin');
                                $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->first();
                                $s = DB::table('date_fin')->where('type', 2)->orderByDesc('id_date')->first();
                                $dt = new DateTime();
                                $date = $dt->format('Y-m-d');
                                return view("success", compact("message", 'post', "s", "date"));
                            }
                        } else {

                            $etudiants = DB::table("etudiant")->where("mat_etud", $post->matricule)->first();
                            $etud = DB::table("etudiant")->orderByDesc("id")->first();
                            $matmat = $etud->mat_etud;
                            $dernier = intval($etud->mat_etud);
                            $dernier++;
                            $mat = (string) $dernier;
                            $candidat = DB::table("candidats")->where("nin",  $poste->nin)->first();
                            // $admission=DB::table('admission')->where('matricule',$etudiants->mat_etud)->get();
                            // $admissions=DB::table('admission')->where('matricule',$etudiants->mat_etud)->first();



                            $date = date('Y-m-d H:i:s');
                            // $dateJ=date('Y-m-d');

                            $dateJ = date('Y-m-d');
                            // $ins=$post->num_auto."/".$annee->Annee;
                            $et = DB::table("etudiant")->where('nin', $candidat->nin)->get();
                            if ($et->count() == 0) {
                                $inscriptions = DB::table("etudiant")->insert([
                                    'mat_etud' => $mat,
                                    'nin' => $candidat->nin,
                                    'nom' => $candidat->nom,
                                    'prenom' => $candidat->prenom,
                                    'date_naiss' => $candidat->date_naiss,
                                    'lieu_naiss' => $candidat->lieu_naiss,
                                    'nationalite' => $candidat->nationalite,
                                    'sexe' => $candidat->sexe,
                                    'Adr_Etud' => $candidat->adresse_cand,
                                    'Tel_Etud' => $candidat->tel_mobile,
                                    'ile' => $candidat->ile,
                                    'situat_familliale' => $candidat->situation,
                                    'nbr_enfants' => $candidat->Nbr_enfants,
                                    'serie_bac' => $candidat->serie,
                                    'mention_bac' => $candidat->mention,
                                    'annee_bac' => $candidat->annee,
                                    'lieu_obt_bac' => $candidat->centre,
                                    'eqv_bac' => $candidat->equiv,
                                    'code_niv' => $post->code_niv,
                                    'code_depart' => $post->code_depart,
                                    'Num_preinscr' => $candidat->num_recu,
                                    'Date_preinscr' => $candidat->datePrescript,
                                    'An_Univ' => $post->Annee,
                                    'date_j' => $date,
                                    'profession' => $candidat->pro,
                                ]);
                            }

                            $ins = $post->num_auto . "/" . $annee->Annee;
                            $inscri = DB::table("inscription")->insert([
                                "Num_Inscrip" => $ins,
                                "NIN" => $post->nin,
                                "Date_Inscrip" => $dateJ,
                                "Mt_Regl_Inscrip" => $post->droit,
                                // "Date_Reg_Inscrip"=>$post->nin,
                                "code_depart" => $post->code_depart,
                                "code_niv" => $post->code_niv,
                                "Annee" => $post->Annee,
                                "mat_etud" => $mat,
                                "Parour_Etud" => "Nouveau",
                                "Resultat" => "",
                                "Session" => "",
                                "Mention" => "",
                            ]);

                            $composante = DB::table("faculte")->where("code_facult", $post->code_facult)->first();
                            $departement = DB::table("departement")->where("code_depart", $post->code_depart)->first();
                            $niveau = DB::table("niveau")->where("code_niv", $post->code_niv)->first();
                            $et = DB::table("etudiant")->where("NIN", $post->nin)->first();


                            $data = DB::table('inscription')
                                ->join('etudiant', 'inscription.mat_etud', '=', 'etudiant.mat_etud')
                                ->select('inscription.*', 'etudiant.*')
                                ->where("inscription.mat_etud", $et->mat_etud)->orderByDesc("Annee")->first();

                            $datas = DB::table('inscription')
                                ->join('niveau', 'inscription.code_niv', '=', 'niveau.code_niv')
                                ->join('departement', 'inscription.code_depart', '=', 'departement.code_depart')
                                ->join('faculte', 'departement.code_facult', '=', 'faculte.code_facult')
                                ->select('inscription.*', 'niveau.*', 'departement.*', 'faculte.*')
                                ->where("inscription.mat_etud", $et->mat_etud)->orderByDesc("Annee")->get();
                            $message = "Matricule Ajouté avec succés!";
                            return view("fiche", compact("message", "post", "data", 'datas'));
                        }
                    }
                } else {
                    $nin = Cookie::get('nin');
                    $post = DB::table("post_inscription")->where("num_auto", $num_auto->num_auto)->first();
                    $s = DB::table('date_fin')->where('type', 2)->orderByDesc('id_date')->first();
                    $dt = new DateTime();
                    $date = $dt->format('Y-m-d');
                    $message = "Vous avez dejà un quitus";
                    return view("success", compact("message", "post", "s", "date"));
                }
            }
        }
    }

    public function accepturl()
    {
        $periode = DB::table('periode_activite')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('id')->first();

        $data = DB::table('candidats')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('num_recu')->first();

        $transaction = DB::table("holo")->where("nin", $data->nin)->first();


        $departement1 = DB::table("departement")
            ->join("faculte", "departement.code_facult", "faculte.code_facult")
            ->select("faculte.*", "departement.*")
            ->where("code_depart", $data->choix1)
            
            ->first();

        $departement2 = DB::table("departement")
            ->join("faculte", "departement.code_facult", "faculte.code_facult")
            ->select("faculte.*", "departement.*")
            ->where("code_depart", $data->choix2)
            ->first();

        $departement3 = DB::table("departement")
            ->join("faculte", "departement.code_facult", "faculte.code_facult")
            ->select("faculte.*", "departement.*")
            ->where("code_depart", $data->choix3)
            ->first();

        $departement = DB::table("departement")
            ->join("faculte", "departement.code_facult", "faculte.code_facult")
            ->select("faculte.*", "departement.*")
            ->where("code_depart", $data->choix1)
            ->first();


        if ($periode->type == 1) {

            if ($data->statut == 4) {

                return view("fiche_preinscription", compact('data', 'departement', 'departement1', 'departement2', 'departement3', 'transaction'));
            } else {
                return redirect("accueil");
            }
        } else {

            $Annee = DB::table('annee')->orderByDesc('id_annee')->first();
            $num_auto = DB::table('post_inscription')->where("user_candidat_id", Auth::user()->id)->where("Annee", $Annee->Annee)->orderByDesc("num_auto")->first();

            $nin = $num_auto->nin;



            if (isset($nin)) {
                $et = DB::table("etudiant")->where("NIN", $nin)->first();


                $data = DB::table('inscription')
                    ->join('etudiant', 'inscription.mat_etud', '=', 'etudiant.mat_etud')
                    ->select('inscription.*', 'etudiant.*')
                    ->where("inscription.mat_etud", $et->mat_etud)->orderByDesc("Annee")->first();

                $datas = DB::table('inscription')
                    ->join('niveau', 'inscription.code_niv', '=', 'niveau.code_niv')
                    ->join('departement', 'inscription.code_depart', '=', 'departement.code_depart')
                    ->join('faculte', 'departement.code_facult', '=', 'faculte.code_facult')
                    ->select('inscription.*', 'niveau.*', 'departement.*', 'faculte.*')
                    ->where("inscription.mat_etud", $et->mat_etud)->orderByDesc("Annee")->get();
                $message = "Matricule Ajouté avec succés!";
                // return view("fiche", compact('message', 'data', 'datas'));
                return view("fiche_renseignement", compact('message', 'data', 'datas'));
            } else {
                return view('recherche_matricule');
            }
        }
    }

    public function cancelurl()
    {
        $periode = DB::table('periode_activite')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('id')->first();

        $data = DB::table('candidats')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('num_recu')->first();

        if ($periode->type == 1) {

            return view("cancelUrl_preinscription", compact('data'));
        } else {
            return view("cancelUrl_inscription", compact("data"));
        }
    }

    public function declineurl()
    {
        $periode = DB::table('periode_activite')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('id')->first();

        $data = DB::table('candidats')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('num_recu')->first();

        if ($periode->type == 1) {

            return view("declineUrl_preinscription", compact("data"));
        } else {
            return view("declineUrl_inscription", compact("data"));
        }
    }

    public function Modification_doc()
    {

        $data = DB::table('candidats')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('num_recu')->first();

        return view("update_document", compact("data"));
    }
    public function Modification_info()
    {


        $data = DB::table('candidats')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('num_recu')->first();

        $annees = DB::table("annee")->get();
        $pays = DB::table('pays')->get();
        $type_recu = DB::table('type_recu')
            ->where("type_preins_id", $data->type_preins_id)
            ->get();
        $preins = DB::table("type_preinscription")
            ->where("id", $data->type_preins_id)
            ->first();

        $preine = DB::table("type_preinscription")->get();

        $recu = DB::table("type_recu")->where("id_type", $data->id_type)->first();

        $bachelier = DB::table("bachelier")->where("NIN", $data->nin)->where("annee", $data->annee)->first();


        return view("update_info", compact("data", "annees", "pays", "type_recu", "preins", "recu", "bachelier", "preine"));
    }

    public function Modification_fili()
    {

        $data = DB::table('candidats')
            ->where("user_candidat_id", Auth::user()->id)
            ->orderByDesc('num_recu')->first();

        $faculte = DB::table("faculte")->where("concours", 0)->get();
        $facultes = DB::table("faculte")->get();

        $candidat = DB::table("candidats")
            ->join("departement", "candidats.choix1", "departement.code_depart")
            ->join("faculte", "faculte.code_facult", "departement.code_facult")
            ->where("user_candidat_id", Auth::user()->id)
            ->select("candidats.*", "departement.*", "faculte.design_facult as design_facult")
            ->first();

        $candidat1 = DB::table("candidats")
            ->join("departement", "candidats.choix1", "departement.code_depart")
            ->join("faculte", "faculte.code_facult", "departement.code_facult")
            ->where("user_candidat_id", Auth::user()->id)
            ->select("candidats.*", "departement.*", "faculte.design_facult as design_facult")
            ->first();


        $candidat2 = DB::table("candidats")
            ->join("departement", "candidats.choix2", "departement.code_depart")
            ->join("faculte", "faculte.code_facult", "departement.code_facult")
            ->where("user_candidat_id", Auth::user()->id)
            ->select("candidats.*", "departement.*", "faculte.design_facult as design_facult")
            ->first();


        $candidat3 = DB::table("candidats")
            ->join("departement", "candidats.choix3", "departement.code_depart")
            ->join("faculte", "faculte.code_facult", "departement.code_facult")
            ->where("user_candidat_id", Auth::user()->id)
            ->select("candidats.*", "departement.*", "faculte.design_facult as design_facult")
            ->first();


        return view("update_fili", compact("data", "faculte", "facultes", "candidat", "candidat1", "candidat2", "candidat3"));
    }

    public function update_info(Request $request)
    {

        $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $datas = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $bachelier = DB::table("bachelier")->where("NIN", $data->nin)->where("annee", $data->annee)->first();
        $type_recu = DB::table('type_recu');
        $pays = DB::table('pays')->get();
        $type_recu = DB::table('type_recu')
            ->where("type_preins_id", $data->type_preins_id)
            ->get();

        if ($datas->type_bac == 1 && $datas->annee >= 2010) {

            if ($request->image == null) {
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->preinscription1,
                        'type_preins_id' => $request->type_preinscription1,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $datas->date_naiss,
                        'lieu_naiss' => $datas->lieu_naiss,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $datas->serie,
                        'mention' => $datas->mention,
                        'centre' => $datas->centre,
                        'num_attest' => $datas->num_attest,

                    ]);

                return redirect("accueil");
            } else {
                $imageName = $datas->nin . '.' . $request->image->extension();
                $request->image->move(public_path('photo'), $imageName);
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->preinscription1,
                        'type_preins_id' => $request->type_preinscription1,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $datas->date_naiss,
                        'lieu_naiss' => $datas->lieu_naiss,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $datas->serie,
                        'mention' => $datas->mention,
                        'centre' => $datas->centre,
                        'num_attest' => $datas->num_attest,
                        'photo' => $imageName,
                    ]);

                return redirect("accueil");
            }
        } else if ($datas->type_bac == 1  && $datas->annee <= 2010) {

            $data = DB::table("bachelier")->where("NIN", $datas->nin)->where("annee", $datas->annee)->first();

            if ($request->image == null) {
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->preinscription2,
                        'type_preins_id' => $request->type_preinscription2,
                        'nin' => $request->nin,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $request->date_naissance,
                        'lieu_naiss' => $request->lieu_naissance,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $request->serie,
                        'mention' => $request->mention,
                        'centre' => $request->centre,
                        'num_attest' => $request->num_attest,


                    ]);
                return redirect("accueil");
            } else {
                $imageName = $request->nin . '.' . $request->image->extension();
                $request->image->move(public_path('photo'), $imageName);
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->preinscription2,
                        'type_preins_id' => $request->type_preinscription2,
                        'nin' => $request->nin,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $request->date_naissance,
                        'lieu_naiss' => $request->lieu_naissance,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $request->serie,
                        'mention' => $request->mention,
                        'centre' => $request->centre,
                        'num_attest' => $request->num_attest,
                        'photo' => $imageName,

                    ]);
                return redirect("accueil");
            }
        } else if ($datas->type_bac == 2) {

            if ($request->image == null) {
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->preinscription2,
                        'type_preins_id' => $request->type_preinscription2,
                        'nin' => $request->nin,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $request->date_naissance,
                        'lieu_naiss' => $request->lieu_naissance,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $request->serie,
                        'mention' => $request->mention,
                        'centre' => $request->centre,
                        'num_attest' => $request->num_attest,


                    ]);

                return redirect("accueil");
            } else {
                $imageName = $request->nin . '.' . $request->image->extension();
                $request->image->move(public_path('photo'), $imageName);
                DB::table('candidats')
                    ->where('user_candidat_id', Auth::user()->id)
                    ->update([
                        'id_type' => $request->preinscription2,
                        'type_preins_id' => $request->type_preinscription2,
                        'nin' => $request->nin,
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'date_naiss' => $request->date_naissance,
                        'lieu_naiss' => $request->lieu_naissance,
                        'sexe' => $request->sexe,
                        'adresse_cand' => $request->adresse,
                        'pays' => $request->pays,
                        'tel_mobile' => $request->telephone,
                        'serie' => $request->serie,
                        'mention' => $request->mention,
                        'centre' => $request->centre,
                        'num_attest' => $request->num_attest,

                        'photo' => $imageName,
                    ]);

                return redirect("accueil");
            }
        }
    }

    public function update_fili(Request $request)
    {
        $candidat = DB::table("candidats")
            ->where("user_candidat_id", Auth::user()->id)
            ->first();

        if ($candidat->id_type == 1) {


            $update = DB::table('candidats')
                ->where('user_candidat_id', Auth::user()->id)
                ->update([

                    'choix1' => $request->departement1,
                    'choix2' => $request->departement2,
                    'choix3' => $request->departement3
                ]);

            return Redirect("accueil");
        } else {
            $request->validate([
                'departement' => 'required',

            ]);

            $update = DB::table('candidats')
                ->where('user_candidat_id', Auth::user()->id)
                ->update([

                    'choix1' => $request->departement,
                ]);

            return Redirect("accueil");
        }
    }

    public function update_doc(Request $request)
    {

        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $doc = DB::table("documents")->where("user_candidat_id", Auth::user()->id)->first();

        $request->validate([
            'document' => 'required|mimes:pdf|max:2048',
        ]);


        $document = $candidat->nin . '.' . $request->document->extension();

        $request->document->move(public_path('document'), $document);

        DB::table('documents')->where(
            "user_candidat_id",
            Auth::user()->id
        )
            ->update([
                "document" => $document
            ]);

        // $docs = DB::table("documents")->where("user_candidat_id", Auth::user()->id)->first();
        // $update = DB::table('candidats')
        //     ->where('user_candidat_id', Auth::user()->id)
        //     ->update([
        //         'document_id' => $docs->id,
        //         'statut' => 3
        //     ]);

        return redirect("accueil");
    }

    public function getPreins1(Request $request)
    {
        $type_recu = DB::table('type_recu')
            ->where("type_preins_id", $request->preins)
            ->pluck("nom_type", "id_type");

        return response()->json($type_recu);
    }

    public function getPreins2(Request $request)
    {
        $type_recu = DB::table('type_recu')
            ->where("type_preins_id", $request->preins)
            ->pluck("nom_type", "id_type");

        return response()->json($type_recu);
    }

    public function recherche_fiche()
    {
        return view("recherche_fiche");
    }

    public function recherche_auto()
    {
        return view("recherche_auto");
    }

    // public function crop(Request $request)
    // {
    //     $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();

    //     $path = 'photo/';
    //     // if (!File::exists(public_path($path))) {
    //     //      File::makeDirectory(public_path($path),0777,true);
    //     // }
    //     $file =$request->image;
    //     $new_image_name =  $data->nin . '.' . $request->image->extension();
    //     // $resize_upload = Image::make( $file->path() )
    //     //                       ->fit(250, 250)
    //     //                       ->save( $path.$new_image_name );
    //     $move = $file->move(public_path($path), $new_image_name);

    //     if ($move) {
    //         return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'name' => $new_image_name]);
    //     } else {
    //         return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
    //     }
    //}


    public function message()
    {

        $data = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();

        $message = DB::table("message")->where("num_recu", $data->num_recu)
        ->orderBy("id","DESC")
        ->first();
        return view("message", compact("data", "message"));
    }

    public function update_doc_co(Request $request)
    {

        $candidat = DB::table("candidats")->where("user_candidat_id", Auth::user()->id)->first();
        $doc = DB::table("documents")->where("user_candidat_id", Auth::user()->id)->first();

        $request->validate([
            'document' => 'required|mimes:pdf|max:2048',
        ]);


        $document = $candidat->nin . '_co.' . $request->document->extension();

        $request->document->move(public_path('document'), $document);

        DB::table('documents')->where(
            "user_candidat_id",
            Auth::user()->id
        )
            ->update([
                "document" => $document
            ]);


            DB::table('message')->where(
                "num_recu",
                $candidat->num_recu
            )
                ->update([
                    "statut" =>0
                ]);
       
        return redirect("accueil");
    }
}
