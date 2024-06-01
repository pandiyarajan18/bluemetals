<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\product;
use App\Models\all_product;
use App\Models\order;
use App\Models\complaint;


class QuarryController extends Controller
{
    public function dashboard()
    {
        $uid = Session::get('uid');
        $datas = product::where('uid', $uid)->get();
        // dd($uid);
        // return view('quarry.quarry-dashboard', compact('datas'));

        $datas = product::leftJoin('all_products', 'products.product_id', '=', 'all_products.id')
            ->where('uid', $uid)
            ->select('products.*', 'all_products.product_name')
            ->get();

        return view('quarry.quarry-dashboard', compact('datas'));
    }
    public function co_page()
    {

        $uid = Session::get('uid');

        $datas = order::selectRaw('orders.*, quarries.*, all_products.*, truckowners.*, orders.id as uid')
            ->leftJoin('quarries', 'orders.quarry_id', '=', 'quarries.id')
            ->leftJoin('all_products', 'orders.product_id', '=', 'all_products.id')
            ->leftJoin('truckowners', 'orders.transport_id', '=', 'truckowners.id')
            ->where('orders.quarry_id', $uid)
            ->where('orders.status', 1)
            ->get();


        // dd($datas);

        return view('quarry.currentOrders', compact('datas'));
    }
    public function oh_page()
    {
        $uid = Session::get('uid');

        $datas = order::selectRaw('orders.*, quarries.*, all_products.*, truckowners.*, orders.id as uid')
            ->leftJoin('quarries', 'orders.quarry_id', '=', 'quarries.id')
            ->leftJoin('all_products', 'orders.product_id', '=', 'all_products.id')
            ->leftJoin('truckowners', 'orders.transport_id', '=', 'truckowners.id')
            ->where('orders.quarry_id', $uid)
            ->where('orders.status', 2)
            ->get();
        return view('quarry.orderhistory', compact('datas'));
    }
    public function sa_page()
    {
        // dd('well');
        $uid = Session::get('uid');
        $datas = complaint::where('quarry_id',$uid)->get();
        // dd($datas);

        return view('quarry.supportAssist',compact('datas'));
    }

    public function add_product()
    {

        $datas = all_product::all();

        return view('quarry.add-product', compact('datas'));
    }
    public function store_product(Request $request)
    {
        // dd($request);
        $uid = Session::get('uid');


        $product = new product();
        $product->uid = $uid;
        $product->product_id = $request->product_id;
        // $product->Product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->status = 0;
        $product->save();

        return redirect()->intended('quarry-dashboard');
    }
    public function Quarryconform_order(Request $request)
    {

        // echo $request->id;

        $dataToUpdate = order::find($request->id);
        $dataToUpdate ->status= 2;
        $dataToUpdate->save();

        return response()->json('success');

    }
}
