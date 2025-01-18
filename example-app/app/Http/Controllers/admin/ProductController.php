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
            // return $img;
            // return $product;
            $data = product::create( $product );
            foreach($image as $img){

                // $img_name = $img->getClientOriginalName();
                $image_name = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $img_name = md5(uniqid($image_name)).".".$extension;
                // $path = $img->store("images","public");
                $img->storeAs('images', $img_name, 'public');
                // return $img_name;
                // return $extension;
                Image::create([
                    "product_id"=>$data->id,
                    "image"=>$img_name,
                ]);
                // Image::saveImg( $data->id , $img_name );

            }

            DB::commit();
            return to_route("product.index");
        }catch(Exception $par){
            DB::rollback();

        }
        // return $img;
        // return $request->except();
        // return "yes";
        // return $request;
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
        // if(isset($request->img)){
        //     $old_img = Image::all()->where("product_id",$id);
        //     foreach($old_img as $old_img){
        //         $old_img_name = $old_img->image;
        //         // return $img_name;
        //         $filePath = asset("storage/images/".$old_img_name);
        //         unlink($filePath);
        //     }
        // }
        $img = $request->only("img");
        // // $img = $image["img"];
        $image_name = $img["img"]->getClientOriginalName();
        $extension = $img["img"]->getClientOriginalExtension();
        $img_name = md5(uniqid($img["img"])).".".$extension;
        // return $img_name;

        // // // $path = $img->store("images","public");
        $img["img"]->storeAs('images', $img_name, 'public');
        // // // // // return $product;
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
                // return $img_name;
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
