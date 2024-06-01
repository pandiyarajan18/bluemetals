<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use App\Models\truckowner;


class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {

// dd('well');
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $status = Auth::user()->status;

            // dd($status);
            if ($status == 1) {
                session(['admin' => true]);
                return redirect()->intended('admin-dashboard');
            } else if ($status == 2) {
                session(['quarry' => true]);
                $uid = Auth::user()->uid;
                Session::put('uid', $uid);
                return redirect()->intended('quarry-dashboard');
            } else if ($status == 3) {
                session(['transport' => true]);
                $transport_id = Auth::user()->uid;

                $truckowner = truckowner::find($transport_id);
                $transport_name=$truckowner->transport_name;
                $transport_ownername=$truckowner->transport_owner_name;

                $data = [
                    'uid' => $transport_id,
                    'transport_name' => $transport_name,
                    'transport_ownername' => $transport_ownername
                ];


                Session::put('data', serialize($data));

                return redirect()->intended('truckOwner-dashboard');
            }
            //  else if ($status == 4) {
            //     return redirect()->intended('Dashboard');
            // }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        // dd('log out');
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
