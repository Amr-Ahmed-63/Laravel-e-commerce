<?php

namespace App\Http\Controllers\web;

use App\Models\Cart;
use App\Models\User;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("web.users.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("web.users.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = $request->except("_token","password_confirmation");
        User::create($user);
        $user_info = User::where("email",$request->email)->get();
        $user = $user_info[0];
        Session::put("user" , $user);
        return to_route("index");

    }
    public function login(Request $request){
        $request->validate([
            "email"=>"required|string|email",
            "password"=>"required|string|min:6",
        ]);
        if(Auth::attempt($request->only("email","password"))){
            $user_email = $request->email;
            $user_info = User::where("email",$request->email)->get();
            $user = $user_info[0];
            Session::put("user" , $user);
            return to_route("index");
        }else{
            $error = "email or password is incorrect";
            return view("web.users.login",compact("error"));
        }
    }

        /**
     * Logout.
     */
    public function logout(){
        Session::flush();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
