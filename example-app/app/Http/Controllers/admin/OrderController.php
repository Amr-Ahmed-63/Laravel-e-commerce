<?php

namespace App\Http\Controllers\admin;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        $arr_all = [];
        $arr = [];
        $user_email = [];
        $user_id = [];
        foreach($order as $order){

            $val = explode("+",$order->products_id);
            foreach($val as $val){
                $name = Product::where("id",$val)->get("name");
                array_push($arr,$name);
            }
            $email = User::where("id",$order->user_id)->get("email");
            $id = $order->user_id;
            // return $arr;
            array_push($arr_all,$arr);
            array_push($user_email,$email);
            array_push($user_id,$id);
        }
        return view("dashboard.order.view",compact("arr","arr_all","user_email","user_id"));
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
        //
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
        $cart = Cart::where("user_id",$id)->get("products_id");
        $cart = $cart[0]->products_id;
        Order::where("user_id",$id)->update(["products_id"=>$cart]);
        Cart::where("user_id",$id)->update(["products_id"=>""]);
        $product = Product::limit(8)->get();
        $image = Image::all();
        return view("web.ecomm.index",compact("product","image"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::where("user_id",$id)->update(["products_id"=>""]);
        return to_route("cart.index");
    }
}
