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
        $user_id = Session::get("user")->id;
        $cart = Cart::where("user_id",$user_id)->get();
        $pro = [];
        $img = [];
        $count = [];
        $total_arr = [];
        $sale_arr = [];
        $total = 0;
        $sale = 0;
        foreach($cart as $cart){
            $product = Product::where("id",$cart->products_id)->get();
            $image = Image::where("product_id",$cart->products_id)->get();
            $item_price = $cart->count * $product[0]->price;
            $item_sale = $cart->count * $product[0]->sale;
            // return $item_price;
            array_push($pro,$product);
            array_push($img,$image);
            array_push($count,$cart->count);
            array_push($total_arr,$item_price);
            array_push($sale_arr,$item_sale);
        }
        foreach($total_arr as $key=>$tot){
            $total += $tot;
            $sale += $sale_arr[$key];
        }
        return view("web.ecomm.checkout",compact("pro","img","count","total","sale"));
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
        $order_count = $request->count;
        $product = Product::where("id",$request->products_id)->get();
        $product_count = $product[0]->count;
        if($product_count >= $order_count){
                $product_new_count = $product_count - $order_count;
            // return $order_count;
            $store_count = ceil($order_count);
            Product::where("id",$request->products_id)->update(["count"=>$product_new_count]);
            Cart::create(["user_id"=>$user_id,"products_id"=>$request->products_id,"count"=>$store_count]);
            return to_route("index");
        }else{
            $mes = "This quantity is unavilable";
            $name = Product::where("id",$request->products_id)->get("name");
            $price = Product::where("id",$request->products_id)->get("price");
            $sale = Product::where("id",$request->products_id)->get("sale");
            $img = Image::where("product_id",$request->products_id)->get("image");
            $id = $request->products_id;
            return view("web.ecomm.addToCart",compact("id","name","price","sale","img","mes"));
            // return view("web.ecomm.addToCart",compact("mes"));
        }
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
