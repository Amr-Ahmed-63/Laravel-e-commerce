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
        return view("dashboard.order.view",compact("orders"));
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
        $user_id = Session::get("id");
        $cart = Cart::where("user_id",$user_id)->get("products_id");
        foreach ($cart as $cart) {
            Order::create(["user_id"=>$user_id,"products_id"=>$cart->products_id]);
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
    public function destroy(Request $request, string $id)
    {
        Order::where("user_id",$id)->where("products_id",$request->products_id)->delete();
        return to_route("order.index");
    }
}
