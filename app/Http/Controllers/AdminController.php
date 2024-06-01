<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quarry;
use App\Models\user;
use App\Models\complaint;

class AdminController extends Controller
{

    public function dashboard()
    {

        $datas = quarry::where('status', '2')->get();

        return view('admin.admin-dashboard', compact('datas'));


    }

    public function show()
    {
        $datas = quarry::where('status', '0')->get();
        return view('admin.quarry-request', compact('datas'));

    }

    public function cmp()
    {

        $datas=complaint::all();
        return view('admin.complaints', compact('datas'));

    }

    public function reg_accept($id)

    {
        $item1 = quarry::find($id);
        $item1->status = 2;
        $item1->save();
        $item = User::where('uid', $id)->first();
        $item->status = 2;
        $item->save();
        return redirect()->intended('quarryRequest');
    }
    public function reg_reject($id)
    {
        $item1 = quarry::find($id);
        $item1->delete();
        $item = User::where('uid', $id)->first();
        $item->delete();
        return redirect()->intended('quarryRequest');
    }



}
