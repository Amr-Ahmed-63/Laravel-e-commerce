<?php

namespace App\Http\Controllers\admin;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::get();
        // return $orders;
        $users_ordered = [];
        $orders_arr = [];
        $user_order = [];
        foreach($orders as $order){
            if(!in_array($order->user_id,$users_ordered)){
                array_push($users_ordered,$order->user_id);
            }
        }
        foreach($users_ordered as $user){
            $order = Order::where("user_id",$user)->get();
            foreach($order as $order){
                $product = Product::where("id",$order->products_id)->get();
                // return $product;
                foreach($product as $product){
                    $product_info = ["product_name"=>$product->name,"count"=>$order->count];
                    array_push($user_order,$product_info);
                }
            }
        }
        array_push($orders_arr,$user_order);
        // $product_name_arr2 = implode(",",$product_name_arr);
        // array_push($products,$product_name_arr2);
        // return $orders_arr;
        // foreach($orders_arr as $o){
        //     foreach($o as $orderr){
        //         return $orderr["product_name"];
        //     }
        // }
        return view("dashboard.order.view",compact("orders_arr","users_ordered"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Session::get("user")->id;
        $cart = Cart::where("user_id",$user_id)->get();
        foreach ($cart as $cart) {
            Order::create(["user_id"=>$user_id,"products_id"=>$cart->products_id,"count"=>$cart->count]);
        }
        Cart::where("user_id",$user_id)->delete();
        return to_route("index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $key)
    {
        $id = Session::get("user")->id;
        Order::where("user_id",$id)->delete();
        return to_route("order.index");
    }
}
