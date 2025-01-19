<?php

namespace App\Http\Controllers\web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Image;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Session::get("id");
        $cart = Cart::where("user_id",$user_id)->get("products_id");
        $pro = [];
        $img = [];

        foreach($cart as $cart){
            $product = Product::where("id",$cart->products_id)->get();
            $image = Image::where("product_id",$cart->products_id)->get();
            array_push($pro,$product);
            array_push($img,$image);
        }
        return view("web.ecomm.checkout",compact("pro","img"));
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
        Cart::create(["user_id"=>$user_id,"products_id"=>$request->products_id]);
        return to_route("index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $name = Product::where("id",$id)->get("name");
        $price = Product::where("id",$id)->get("price");
        $sale = Product::where("id",$id)->get("sale");
        $img = Image::where("product_id",$id)->get("image");
        return view("web.ecomm.addToCart",compact("id","name","price","sale","img"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

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
    public function destroy(string $id)
    {
        //
    }
}
