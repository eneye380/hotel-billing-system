<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginMeController extends Controller
{
    public function login(Request $request)
    {
      
        try {
            $rememberMe = false;

            if (isset($request->remember_me)) {
                $rememberMe = true;
            }
            if(!strcasecmp('admin@admin.com', $request->email)){
                return redirect()->back()->with(["error"=>"Wrong Credentials"]);
            }
            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                //$slug = Sentinel::getUser()->roles()->first()->slug;
                /**if ($slug == 'admin') {
                    //return redirect('/earnings');
                    }
                if ($slug == 'manager') {
                    
                }*/
                return redirect('admin/hotels');
            } else {
                return redirect()->back()->with(["error"=>"Wrong Credentials"]);
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            //return redirect()->back()->with(["error"=>"You are banned for $delay seconds."]);
            return response()->json(["error"=>"You are banned for $delay seconds."],500);
        } catch (NotActivatedException $e) {
            return response()->json(["error"=>"Your account is not activated!"],500);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/');
    }
}
