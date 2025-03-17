<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mes = Message::all();
        return view("dashboard.message.view",compact("mes"));
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

        $insert = Message::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "message"=>$request->message,
        ]);
        if($insert){
            $data = 'Your message has been sent successfully';
        }
        return view("web.ecomm.contactUs",compact("data"));
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
        Message::where("id",$id)->delete();
        return to_route("message.index");
    }
}
