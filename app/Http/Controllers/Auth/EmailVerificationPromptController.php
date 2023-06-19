<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        // return $request->user()->hasVerifiedEmail()
        //             ? redirect()->intended('login')
        //             : view('auth.verify-email');

         
           if($request->user()->hasVerifiedEmail())
           {
            $s=DB::table('date_fin')->orderByDesc('id_date')->first();
                if($s->type==1)
                {
                    return redirect()->intended('/mon_bac');
                }
                else if($s->type==2)
                {
                    return redirect()->intended('/home');
                }
                else if($s->type==3)
                {
                    return redirect()->intended('/periode');

                    
                }
           } 
           else
           {
                return view('auth.verify-email');
           }        
    }
}
