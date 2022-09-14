<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class AdminLoginService.
 */
class AdminLoginService
{
    public function adminLogin($request){

        if(Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ],
            $request->get('remember'))) {
          return redirect('/admin/dashboard');
        }
        Session::flash('error', 'Incorrect login credentials');
        return redirect()->back();
    }

    public function adminLogout(): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
