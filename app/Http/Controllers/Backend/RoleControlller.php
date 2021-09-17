<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount(['permissions'])->with(['permissions'])->get();
        //return $roles;
        return view('dashboard.Role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::with(['permission'])->get();
        //return $modules;
        return view('dashboard.Role.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        dd($request->all());
        // $notification = [
        //     'alert_type' => 'success',
        //     'message' => 'Role Created Successfully!!'
        // ];
        // return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('dashboard.Role.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('dashboard.Role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $notification = [
            'alert_type' => 'info',
            'message' => 'Role Updated Successfully!!'
        ];
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $notification = [
            'alert_type' => 'danger',
            'message' => 'Role Deleted Successfully!!'
        ];
        return redirect()->route('roles.index')->with($notification);
    }
}
