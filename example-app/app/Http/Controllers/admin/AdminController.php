<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::get();
        return view("dashboard.admin.view",compact("admin"));
        // return "yes";
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.admin.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        Admin::create($request->toArray());
        return view("dashboard.admin.view");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::findOrfail($id);
        return view("dashboard.admin.update",compact("admin"));

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
        $data = $request->except("_token","_method");
        $data["permission"] = implode("+",$request->permission);
        Admin::where("id",$id)->update($data);
        return to_route("admin.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::where("id",$id)->delete();
        return to_route("admin.index");
    }
}
