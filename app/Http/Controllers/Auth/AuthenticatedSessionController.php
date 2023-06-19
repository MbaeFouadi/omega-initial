<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth_login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $s = DB::table('date_fin')->orderByDesc('id_date')->first();
        if ($s->type == 1) {
            return redirect()->intended('/mon_bac');
        } else if ($s->type == 2) {
            return redirect()->intended('/inscription_etudiant');
        } else if ($s->type == 3) {

            $candidats = DB::table("candidats")
                ->where("user_candidat_id", Auth::user()->id)
                ->where(function ($query) {
                    $query->where('statut',null)
                        ->orWhere('statut',1)
                        ->orWhere('statut',2)
                        ->orWhere('statut',3);
                })
                ->first();
            $Annee = DB::table('annee')->orderByDesc("id_annee")->first();
            $post = DB::table('post_inscription')->where("user_candidat_id", Auth::user()->id)->where("Annee", $Annee->Annee)->orderByDesc("num_auto")->first();

            if (isset($candidats)) {
                return redirect()->intended('/mon_bac');
            } elseif (isset($post)) {
                return redirect()->intended('/inscription_etudiant');
            } else {
                return redirect()->intended('/periode');
            }
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function inscription_etudiant()
    {
        $Annee = DB::table('annee')->orderByDesc("id_annee")->first();
        $num_auto = DB::table('post_inscription')->where("user_candidat_id", Auth::user()->id)->where("Annee", $Annee->Annee)->orderByDesc("num_auto")->first();


        if (isset($num_auto)) {
            $inscription = DB::table("inscription")->where("NIN", $num_auto->nin)->where('Annee', $Annee->Annee)->first();
            if (isset($inscription)) {
                return redirect("/accepturl");
            } else {
                $annee = DB::table('annee')->orderByDesc("id_annee")->first();
                $annees = $annee->Annee;
                $data = DB::table("post_inscription")->where("nin", $num_auto->nin)->where("Annee", $annees)->first();
                $composante = DB::table("faculte")->where("code_facult", $data->code_facult)->first();
                $departement = DB::table("departement")->where("code_depart", $data->code_depart)->first();
                $niveau = DB::table("niveau")->where("code_niv", $data->code_niv)->first();
                $candidats = DB::table("candidats")->where("nin", $num_auto->nin)->first();

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

                $s = DB::table('date_fin')->where('type', 2)->orderByDesc('id_date')->first();
                $dt = new DateTime();
                $date = $dt->format('Y-m-d');
                return view("autorisation", compact("data", "composante", "departement", "niveau", "candidats", "sessionId", "s", "date"));
            }
        } else {
            return redirect()->intended('/home');
        }
    }
}
