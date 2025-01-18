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

        $cart = Cart::all()->where("user_id",$user_id);
        $cart_str = $cart[1]->products_id;
        $cart_arr = explode("+",$cart_str);
        $product_name = [];
        $product_price = [];
        $product_sale = [];
        $img_image = [];
        foreach($cart_arr as $crt){
            $name = Product::where("id",$crt)->get("name");
            $price = Product::where("id",$crt)->get("price");
            $sale = Product::where("id",$crt)->get("sale");
            $img = Image::where("product_id",$crt)->get("image");
            array_push($product_name,$name);
            array_push($product_price,$price);
            array_push($product_sale,$sale);
            array_push($img_image,$img);
        }
        // return $product_name;
        // return count($cart_arr);
        return view("web.ecomm.checkout",compact("user_id","product_name","product_price","product_sale","img_image","cart_arr"));
        // return view("web.ecomm.checkout",compact("cart"));
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
        // $product = Product::all()->where("id",$id);
        // $img = Image::all()->where("product_id",$id);
        // return view("web.ecomm.addToCart",compact("id","product","img"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = Session::get("id");
        $cart = Cart::where("user_id",$user_id)->get("products_id");

        if( null == $cart[0]->products_id){
            Cart::where("user_id",$user_id)->update(["products_id"=>$request->products_id]);
            $product = Product::all();
            $image = Image::all();
            return view("web.ecomm.index",compact("product","image"));

        }else{
            $cart_arr = explode("+",$cart[0]->products_id);
            array_push($cart_arr,$request->products_id);
            $cart_str = implode("+",$cart_arr);
            Cart::where("user_id",$user_id)->update(["products_id"=>$cart_str]);
            $product = Product::all();
            $image = Image::all();
            return view("web.ecomm.index",compact("product","image"));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
