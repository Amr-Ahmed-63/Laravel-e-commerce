<?php

namespace App\Http\Controllers\admin;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Exceptions\Renderer\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $image = Image::all();
        return view("dashboard.product.view",compact("product" , "image"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.product.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try{
            DB::beginTransaction();


            $product = $request->except("_token","img");
            $image = $request->only("img");
            $data = product::create( $product );
            foreach($image as $img){
                $image_name = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $img_name = md5(uniqid($image_name)).".".$extension;
                $img->storeAs('images', $img_name, 'public');
                Image::create([
                    "product_id"=>$data->id,
                    "image"=>$img_name,
                ]);

            }

            DB::commit();
            return to_route("product.index");
        }catch(Exception $par){
            DB::rollback();

        }
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
        $product = Product::findOrFail($id);
        return view("dashboard.product.update",compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = $request->except("_method","_token","img");
        $img = $request->only("img");
        $extension = $img["img"]->getClientOriginalExtension();
        $img_name = md5(uniqid($img["img"])).".".$extension;
        $img["img"]->storeAs('images', $img_name, 'public');
        Image::where("product_id",$id)->update(["image"=>$img_name]);
        Product::where("id",$id)->update($product);
        return to_route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            Product::where('id',$id)->delete();
            $img = Image::all()->where("product_id",$id);
            foreach($img as $img){
                $img_name = $img->image;
                $filePath = asset("storage/images/".$img_name);
                unlink($filePath);
            }
            Image::where('product_id',$id)->delete();
            DB::commit();
            return to_route("product.index");
        } catch (Exception $par) {
            DB::rollBack();
        }

    }
}
