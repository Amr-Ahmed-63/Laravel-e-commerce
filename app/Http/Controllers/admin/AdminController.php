<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Permission;
// use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where("isAdmin","1")->get();
        $user_id = Session::get("user")->id;
        $permissions = Permission::where("user_id",$user_id)->get()[0];
        $permission = $permissions->permissions;
        if($permission != null){
            $per = explode(",",$permission);
            if(in_array("edit.user",$per)){
                $access = "true";
            }else{
                $access = "false";
            }
        }else{
            $access = "false";
        }
        return view("dashboard.admin.view",compact("admin","access"));

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
    public function store(UserRequest $request)
    {
        // return $request;
        $permissions = $request->permission;
        // return $user;
        if($permissions != null){
            $permission = implode(",",$permissions);
            User::create($request->toArray());
            $user = User::where("email",$request->email)->get();
            $user_id = $user[0]->id;
            Permission::create(["user_id"=>$user_id,"permissions"=>$permission]);
        }else{
            User::create($request->toArray());
        }
        return to_route("admin.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::findOrfail($id);
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
        $data = $request->except("_token","_method","permission");
        $permissions = $request->permission;
        User::where("id",$id)->update($data);
        if($permissions != null){
            $permission = implode(",",$permissions);
            Permission::where("user_id",$id)->update(["permissions"=>$permission]);
        }
        return to_route("admin.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where("id",$id)->delete();
        Permission::where("user_id",$id)->delete();
        return to_route("admin.index");
    }
}
