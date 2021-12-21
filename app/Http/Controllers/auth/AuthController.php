<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request) {

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            echo "login";
            print_r(Auth::user());
            // Authentication passed...
            //return redirect()->intended('dashboard');
            if(Auth::user()->usertype=='user'){
                return redirect()->route('user.dashboard');
            }
            else{
                return redirect()->route('admin.dashboard');
            }
        }else{
            return redirect()->route('login');
        }
    }

}
