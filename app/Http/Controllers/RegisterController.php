<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\quarry;
use App\Models\truckowner;
use App\Models\district;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function showquarry()
    {

        $data = district::all();
        return view('auth.quarry-register', ['datas' => $data]);
    }
    public function showtransport()
    {
        return view('auth.transport-register');
    }
    public function quarryreg(Request $request)
    {



        $quarry = new quarry();

        $quarry->quarry_name = $request->quarryname;
        $quarry->quarry_ownername = $request->quarryownername;
        $quarry->phone = $request->phone;
        $quarry->quarry_address = $request->quarryaddress;
        $quarry->district = $request->district;
        $quarry->pincode = $request->pincode;
        $quarry->lat1 = $request->lat;
        $quarry->long1 = $request->long;
        $quarry->status =0;

        $image = $request->file('quarryphoto');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('img'), $imageName);

        $quarry->quarry_photo =$imageName;
        $quarry->save();

        $recentId = quarry::latest()->first()->id;
        $user = new user();
        $user->uid = $recentId;
        $user->username = $request->quarryname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status =0;

        $user->save();

        return redirect('/login')->with('success', 'Post deleted successfully');;

        // return redirect()->route('/dashboard')
        // ->with('success', 'Post deleted successfully');
    }


    public function transportreg(Request $request)
    {

        $truckowner = new truckowner();
        $truckowner->transport_name=$request->transportname;
        $truckowner->transport_owner_name=$request->transportownername;
        $truckowner->phone=$request->phone;
        $truckowner->transport_address=$request->transportaddress;
        $truckowner->status=0;

        $truckowner->save();


        $recentId = truckowner::latest()->first()->id;
        $user = new user();
        $user->uid = $recentId;
        $user->username = $request->transportname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status =3;

        $user->save();

        return redirect('/login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }


}
