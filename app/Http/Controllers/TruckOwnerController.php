<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quarry;
use App\Models\product;
use App\Models\district;
use App\Models\all_product;
use App\Models\order;
use App\Models\complaint;
use phpDocumentor\Reflection\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;

class TruckOwnerController extends Controller
{

    public function dashboard()
    {
        $today = now()->toDateString();
        $fastSellingProductsByQuarry = DB::table('orders')
            ->select('quarry_id', 'product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->where('created_at', $today)
            ->groupBy('quarry_id', 'product_id')
            ->orderByDesc('total_quantity')
            ->get();
        foreach ($fastSellingProductsByQuarry as $record) {
            $quarryId = $record->quarry_id;
            $productId = $record->product_id;
            $order_quantity = $record->total_quantity;
            $products = Product::where('uid', $quarryId)->where('product_id', $productId)->get();
            if ($products->isNotEmpty()) {
                foreach ($products as $product) {
                    $quantity = $product->quantity;
                    $price = $product->price;
                    $percentage1 = ($quantity / ($quantity + $order_quantity)) * 100;
                    if ($percentage1 > 40 && $percentage1 <= 50) {
                        if ($product->price_status != 1) {
                            $percentageIncrease = 2;
                            $data = ($price * $percentageIncrease) / 100;
                            $updateprice = $price + $data;
                            $product->price = $updateprice;
                            $product->created_at = $today;
                            $product->price_status = '1';
                            $product->save();
                        }
                    } elseif ($percentage1 > 30 && $percentage1 <= 40) {
                        if ($product->price_status != 2) {
                            $percentageIncrease = 4;
                            $data = ($price * $percentageIncrease) / 100;
                            $updateprice = $price + $data;
                            $product->price = $updateprice;
                            $product->created_at = $today;
                            $product->price_status = '2';
                            $product->save();
                        }
                    } elseif ($percentage1 > 20 && $percentage1 <= 30) {
                        if ($product->price_status != 3) {
                            $percentageIncrease = 6;
                            $data = ($price * $percentageIncrease) / 100;
                            $updateprice = $price + $data;
                            $product->price = $updateprice;
                            $product->created_at = $today;
                            $product->price_status = '3';
                            $product->save();
                        }
                    } elseif ($percentage1 > 10 && $percentage1 <= 20) {
                        if ($product->price_status != 4) {
                            $percentageIncrease = 8;
                            $data = ($price * $percentageIncrease) / 100;
                            $updateprice = $price + $data;
                            $product->price = $updateprice;
                            $product->created_at = $today;
                            $product->price_status = '4';
                            $product->save();
                        }
                    } elseif ($percentage1 > 0 && $percentage1 <= 10) {
                        if ($product->price_status != 5) {
                            $percentageIncrease = 10;
                            $data = ($price * $percentageIncrease) / 100;
                            $updateprice = $price + $data;
                            $product->price = $updateprice;
                            $product->created_at = $today;
                            $product->price_status = '5';
                            $product->save();
                        }
                    }
                }
            }
        }







        // $today = now()->toDateString();
        // $ontoday = '2024-03-26';

        // // dd($ontoday);
        // $fastSellingProductsByQuarry = DB::table('orders')
        //     ->select('quarry_id', 'product_id', DB::raw('SUM(quantity) as total_quantity'))
        //     ->where('created_at', $ontoday)
        //     ->groupBy('quarry_id', 'product_id')
        //     ->orderByDesc('total_quantity')
        //     ->get();
        // // dd($fastSellingProductsByQuarry);
        // foreach ($fastSellingProductsByQuarry as $record) {
        //     $quarryId = $record->quarry_id;
        //     $productId = $record->product_id;
        //     $order_quantity = $record->total_quantity;

        //     $products = Product::where('uid', $quarryId)->where('product_id', $productId)->get();
        //     // dd($products);
        //     if ($products->isNotEmpty()) {
        //         foreach ($products as $product) {

        //             $quantity = $product->quantity;
        //             $price = $product->price;


        //             $order_quantity2 = 50    ;
        //             $quantity2 = 65;

        //             $percentage1 = ($quantity2 / ($quantity2 + $order_quantity2)) * 100;

        //             dd($percentage1);

        //             if ($percentage1 > 40 && $percentage1 <= 50) {
        //                 if ($product->status != 1 &&$product->created_at->toDateString() == $today) {
        //                     $percentageIncrease = 2;
        //                     $data = ($price * $percentageIncrease) / 100;
        //                     $updateprice = $price + $data;
        //                     $product->price = $updateprice;
        //                     $product->created_at = $today;
        //                     $product->price_status = '1';

        //                     $product->save();
        //                     dd('updated');
        //                 } else {
        //                     dd('today updated2');
        //                 }


        //                 dd('41-50');
        //             } elseif ($percentage1 > 30 && $percentage1 <= 40) {
        //                 if ($product->status != 2 &&$product->created_at->toDateString() == $today) {
        //                     $percentageIncrease = 4;
        //                     $data = ($price * $percentageIncrease) / 100;
        //                     $updateprice = $price + $data;
        //                     $product->price = $updateprice;
        //                     $product->created_at = $today;
        //                     $product->price_status = '2';

        //                     $product->save();
        //                     dd('updated');
        //                 } else {
        //                     dd('today updated4');
        //                 }
        //                 dd('31-40');
        //             } elseif ($percentage1 > 20 && $percentage1 <= 30) {
        //                 // dd('WELL');
        //                 if ($product->status != 3 &&$product->created_at->toDateString() == $today) {
        //                     $percentageIncrease = 6;
        //                     $data = ($price * $percentageIncrease) / 100;
        //                     $updateprice = $price + $data;
        //                     $product->price = $updateprice;
        //                     $product->created_at = $today;
        //                     $product->price_status = '3';

        //                     $product->save();
        //                     dd('updated');
        //                 } else {
        //                     dd('today updated6');
        //                 }
        //                 dd('21-30');
        //             } elseif ($percentage1 > 10 && $percentage1 <= 20) {
        //                 if ($product->status != 4 &&$product->created_at->toDateString() == $today) {
        //                     $percentageIncrease = 8;
        //                     $data = ($price * $percentageIncrease) / 100;
        //                     $updateprice = $price + $data;
        //                     $product->price = $updateprice;
        //                     $product->created_at = $today;
        //                     $product->price_status = '4';

        //                     $product->save();
        //                     dd('updated');
        //                 } else {
        //                     dd('today updated8');
        //                 }
        //                 dd('11-20');
        //             } elseif ($percentage1 > 0 && $percentage1 <= 10) {
        //                 if ($product->status != 5 &&$product->created_at->toDateString() == $today) {
        //                     $percentageIncrease = 10;
        //                     $data = ($price * $percentageIncrease) / 100;
        //                     $updateprice = $price + $data;
        //                     $product->price = $updateprice;
        //                     $product->created_at = $today;
        //                     $product->price_status = '5';

        //                     $product->save();
        //                     dd('updated');
        //                 } else {
        //                     dd('today updated10');
        //                 }
        //                 dd('1-10');
        //             } else {
        //                 dd('above 50');
        //             }


        //             //     if($quantity < $order_quantity ){
        //             //     $percentageIncrease = 10;
        //             //     $data=($price * $percentageIncrease) / 100;

        //             //     echo $data;
        //             //     }
        //             echo "Quarry ID: $quarryId, Product ID: $productId, In stok: $quantity, Order quantity: $order_quantity <br>";
        //         }
        //     } else {
        //         dd("Product data not found for quarry ID: $quarryId and product ID: $productId");
        //     }
        // }









        //         $fastSellingProductsByQuarry = DB::table('orders')
        //     ->select('quarry_id', 'product_id', DB::raw('SUM(quantity) as total_quantity'))
        //     ->groupBy('quarry_id', 'product_id')
        //     ->orderByDesc('total_quantity')
        //     ->get();

        // dd($fastSellingProductsByQuarry);
        //     foreach ($fastSellingProductsByQuarry as $record) {

        //         $quarryId = $record->quarry_id;
        //         $productId = $record->product_id;
        // dd($quarryId);
        //         $product = Product::where('uid', $quarryId)->where('product_id',$productId)->first();

        //         dd($product);

        //     }

        // dd($fastSellingProductsByQuarry);


        //         $fastSellingProductsByQuarry = DB::table('orders')
        //     ->join('order_product', 'orders.id', '=', 'order_product.order_id')
        //     ->select('orders.quarry_id', 'order_product.product_id', DB::raw('SUM(order_product.quantity) as total_quantity'))
        //     ->groupBy('orders.quarry_id', 'order_product.product_id')
        //     ->orderByDesc('total_quantity')
        //     ->get();

        //     foreach ($fastSellingProductsByQuarry as $record) {
        //         echo "Quarry ID: $record->quarry_id, Product ID: $record->product_id, Total Quantity: $record->total_quantity\n";
        //     }
        // dd('well');


        //         $fastSellingProductsByQuarry = DB::table('orders')
        //     ->select('quarry_id', 'product_id', DB::raw('COUNT(*) as total_orders'))
        //     ->groupBy('quarry_id', 'product_id')
        //     ->orderByDesc('total_orders')
        //     ->get();

        // dd($fastSellingProductsByQuarry);

        //         $fastSellingProducts = DB::table('orders')
        //         ->select('product_id', DB::raw('COUNT(*) as total_orders'))
        //         ->groupBy('product_id')
        //         ->orderByDesc('total_orders')
        //         ->get();

        // dd($fastSellingProducts);






        $datas = district::all();

        return view('truckOwner.truckOwner-dashboard', compact('datas'));
    }
    public function co_page()
    {
        $serializedData = Session::get('data');
        $data1 = unserialize($serializedData);
        $uid = $data1['uid'];

        // $uid = Session::get('uid');

        $datas = order::selectRaw('orders.*, quarries.*,all_products.*')
            ->leftJoin('quarries', 'orders.quarry_id', '=', 'quarries.id')
            ->leftJoin('all_products', 'orders.product_id', '=', 'all_products.id')
            ->where('orders.transport_id', $uid)->where('orders.status', 1)->get();

        // dd($datas);
        return view('truckOwner.currentOrders', compact('datas'));
    }
    public function oh_page()
    {
        $serializedData = Session::get('data');
        $data1 = unserialize($serializedData);
        $uid = $data1['uid'];


        $datas = order::selectRaw('orders.*, quarries.*,all_products.*')
            ->leftJoin('quarries', 'orders.quarry_id', '=', 'quarries.id')
            ->leftJoin('all_products', 'orders.product_id', '=', 'all_products.id')
            ->where('orders.transport_id', $uid)->where('orders.status', 2)->get();
        return view('truckOwner.orderHistory', compact('datas'));
    }
    public function sa_page()
    {
        $serializedData = Session::get('data');
        $data1 = unserialize($serializedData);
        $uid = $data1['uid'];

        $datas = complaint::where('transport_id', $uid)->get();


        return view('truckOwner.customerSupport', compact('datas'));
    }
    public function search_product(Request $request)
    {


        $sentence = $request->speech;
        $inputWords = explode(' ', $sentence);

        $results = all_product::where(function ($query) use ($inputWords) {
            $query->whereIn('product_name', $inputWords);
        })->get();
        // dd($results);
        $all = count($results);

        if ($all == 1) {
            $product_name = $results[0]->id;
        } else {
            $word = "sand";
            $searchValues = preg_split('/\s+/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
            $words = explode(" ", $sentence);

            $position = array_search($word, $words);
            if ($position) {
                $ans = $position - 1;
                $data1 = $searchValues[$ans];
                $data2 = $searchValues[$position];
                $product_name = $data1 . '.' . $data2;

                $searchTerm = $product_name;
                $products = all_product::where('product_name', 'like', "%$searchTerm%")->get();
                $product_name = $products[0]->id;
            } else {
                $word = "mm";
                $searchValues = preg_split('/\s+/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
                $words = explode(" ", $sentence);
                $position = array_search($word, $words);

                if ($position) {
                    $ans = $position - 1;
                    $data1 = $searchValues[$ans];
                    $data2 = $searchValues[$position];
                    $product_name = $data1 . $data2;

                    $searchTerm = $product_name;
                    $products = all_product::where('product_name', 'like', "%$searchTerm%")->get();
                    $product_name = $products[0]->id;
                } else {
                    return back()->withErrors([
                        'speech' => 'The provided credentials do not match our records.',
                    ]);
                }
            }
        }




        $word = "unit";
        $searchValues = preg_split('/\s+/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
        $words = explode(" ", $sentence);
        $position = array_search($word, $words);

        if ($position) {
            $ans = $position - 1;
            $data1 = $searchValues[$ans];
            $unit = (int)$data1;


            if ($unit != 0) {
                $userLatitude = $request->lat;
                $userLongitude = $request->long;


                if ($request->status == 1) {
                    $locations = Quarry::selectRaw('quarries.*, products.*, all_products.*, ROUND( ( 6371 * acos( cos( radians(?) ) * cos( radians(quarries.lat1) ) * cos( radians(quarries.long1) - radians(?) ) + sin( radians(?) ) * sin( radians(quarries.lat1) ) ) ), 1 ) AS distance', [$userLatitude, $userLongitude, $userLatitude])
                        ->leftJoin('products', 'quarries.id', '=', 'products.uid')
                        ->leftJoin('all_products', 'products.product_id', '=', 'all_products.id')
                        ->where('product_id', $product_name)
                        ->where('quantity', '>', $unit) // Add your where condition here
                        ->orderBy('distance')
                        ->first();

                    // dd($locations);
                    return view('truckOwner.order-page', compact('locations', 'unit', 'userLatitude', 'userLongitude', 'sentence'));
                } elseif ($request->status == 2) {
                    $locations = Quarry::selectRaw('quarries.*, products.*, all_products.*, ROUND( ( 6371 * acos( cos( radians(?) ) * cos( radians(quarries.lat1) ) * cos( radians(quarries.long1) - radians(?) ) + sin( radians(?) ) * sin( radians(quarries.lat1) ) ) ), 1 ) AS distance', [$userLatitude, $userLongitude, $userLatitude])
                        ->leftJoin('products', 'quarries.id', '=', 'products.uid')
                        ->leftJoin('all_products', 'products.product_id', '=', 'all_products.id')
                        ->where('product_id', $product_name)
                        ->where('quantity', '>', $unit) // Add your where condition here
                        ->orderBy('distance')
                        ->get();
                    // dd( $locations );
                    return view('truckOwner.list-quarry', compact('locations', 'unit', 'userLatitude', 'userLongitude', 'sentence'));
                } elseif ($request->status == 3) {

                    $uid = $request->uid;
                    $locations = Quarry::selectRaw('quarries.*, products.*, all_products.*, ROUND( ( 6371 * acos( cos( radians(?) ) * cos( radians(quarries.lat1) ) * cos( radians(quarries.long1) - radians(?) ) + sin( radians(?) ) * sin( radians(quarries.lat1) ) ) ), 1 ) AS distance', [$userLatitude, $userLongitude, $userLatitude])
                        ->leftJoin('products', 'quarries.id', '=', 'products.uid')
                        ->leftJoin('all_products', 'products.product_id', '=', 'all_products.id')
                        ->where('product_id', $product_name)
                        ->where('quarries.id', $uid)
                        ->where('quantity', '>', $unit) // Add your where condition here
                        ->orderBy('distance')
                        ->first();

                    // dd($locations);
                    return view('truckOwner.order-page', compact('locations', 'unit', 'userLatitude', 'userLongitude', 'sentence'));
                }
            } else {
                dd('not');
            }
        }


        // $userLatitude = $request->lat;
        // $userLongitude = $request->long;

        // $locations = quarry::selectRaw('*, ( 6371 * acos( cos( radians(?) ) * cos( radians(lat1) ) * cos( radians(long1) - radians(?) ) + sin( radians(?) ) * sin( radians(lat1) ) ) ) AS distance', [$userLatitude, $userLongitude, $userLatitude])
        //     ->orderBy('distance')
        //     ->get();


        //     return view('truckOwner.list-quarry',compact('locations'));

    }

    public function get_product(Request $request)
    {
        $district = $request->district;

        $data = Quarry::where('district', $district)->get();

        $uniqueProductIds = [];

        foreach ($data as $record) {

            $products = Product::where('uid', $record->id)->pluck('product_id')->toArray();

            $uniqueProductIds = array_merge($uniqueProductIds, $products);
        }

        $uniqueProductIds = array_unique($uniqueProductIds);

        foreach ($uniqueProductIds as $productId) {

            $data = all_product::where('id', $productId)->get();

            foreach ($data as $product) {

                $productsArray[] = $product;

                // echo $product->id . ' - ' . $product->product_name . "<br>";
            }
        }
        return response()->json($productsArray);
    }


    public function drop_quarry(Request $request)
    {
        // dd($request->all());

        $district = $request->district;
        $product = $request->product;
        if ($request->status == 1) {


            $locations = Quarry::selectRaw('quarries.*, products.*,all_products.*')
                ->leftJoin('products', 'quarries.id', '=', 'products.uid')
                ->leftJoin('all_products', 'products.product_id', '=', 'all_products.id')
                ->where('quarries.district', $district)
                ->where('products.product_id', $product)
                ->get();
                // dd($locations);
            return view('truckOwner.droplist-quarry', compact('locations', 'district', 'product'));
        } elseif ($request->status == 2) {

            $locations = Quarry::selectRaw('quarries.*, products.*,all_products.*')
                ->leftJoin('products', 'quarries.id', '=', 'products.uid')
                ->leftJoin('all_products', 'products.product_id', '=', 'all_products.id')
                ->where('quarries.district', $district)
                ->where('products.product_id', $product)
                ->where('quarries.id', $request->uid)
                ->first();

            // dd($locations);
            // dd($locations);

            return view('truckOwner.droporder-page', compact('locations'));
        }
    }

    public function place_order(Request $request)
    {
        // dd($request->all());
        $dateTime = now()->format('Y-m-d H:i:s');


        $serializedData = Session::get('data');
        $data1 = unserialize($serializedData);
        $uid = $data1['uid'];




        $datas = $request->all();
        // dd($datas);
        $order = new order();
        $order->product_id = $request->product_id;
        $order->price = $request->price;
        $order->quantity = $request->quantity;
        $order->total = $request->total;
        $order->quarry_id = $request->quarry_id;
        $order->transport_id = $uid;
        $order->phone = $request->phone;
        $order->vehicle_no = $request->vehicle_number;
        $order->billing_address = $request->billingAddress;
        $order->status = $request->status;
        $email = $request->email;

        // $order->save();

        $data = product::selectRaw('quarries.*, products.*')
            ->leftJoin('quarries', 'products.uid', '=', 'quarries.id')
            ->where('products.product_id', $request->product_id)
            ->where('products.uid', $request->quarry_id)
            ->first();

        $oldquantity = $data->quantity;
        $orderquantity = $request->quantity;

        $remain = $oldquantity - $orderquantity;
        // dd($remain);

        $data->quantity = $remain;

        $mailData = [
            'transport_name' => $data1['transport_name'],
            'transport_ownername' => $data1['transport_ownername'],
            'product_name' => $request->product_name,
            'quantity'=> $request->quantity,
            'total'=> $request->total,
            'billingAddress'=> $request->billingAddress,
            'date'=>$dateTime
        ];

        mail::to($email)->send(new HelloMail($mailData));

        $data->save();
        $order->save();


        return redirect()->intended('truckOwner-dashboard');
    }
    public function complaint(Request $request)
    {

        $serializedData = Session::get('data');
        $data1 = unserialize($serializedData);
        $uid = $data1['uid'];

        $compl = new complaint();
        $compl->quarry_id = $request->quarry_id;
        $compl->complaint = $request->complaint;
        $compl->status = '0';
        $compl->transport_id = $uid;
        $compl->save();

        return redirect()->intended('truckOwner-dashboard');
    }
}
