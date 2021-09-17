<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.access-role');
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
        Gate::authorize('app.create-role');
        $modules = Module::with(['permissions'])->get();
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
        Gate::authorize('app.create-role');

        $role = Role::updateOrCreate([
            'role_name' => $request->input('role_name'),
            'role_slug' => Str::slug($request->input('role_name')),
            'role_note' => $request->input('role_name').' has limited permissions',
            'deleteable' => true,
        ])->permissions()->sync($request->input('permissions', []));


        $notification = [
            'alert_type' => 'Success',
            'message' => 'Role Created Successfully!!'
        ];

        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        Gate::authorize('app.access-role');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('app.edit-role');
        $modules = Module::with(['permissions'])->get();
        return view('dashboard.Role.create', compact('role', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        Gate::authorize('app.edit-role');
        $role->update([
            'role_name' => $request->input('role_name'),
            'role_slug' => Str::slug($request->input('role_name')),
            'role_note' => $request->input('role_name').' has limited permissions',
            'deleteable' => true,
        ]);
        $role->permissions()->sync($request->input('permissions'));


        $notification = [
            'alert_type' => 'Info',
            'message' => 'Role Updated Successfully!!'
        ];
        notify()->info($notification['message'],$notification['alert_type'],"topRight");
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
        Gate::authorize('app.delete-role');
        if($role->deleteable){
            $role->delete();
            $notification = [
                'alert_type' => 'Success',
                'message' => 'Role Deleted Successfully!!'
            ];
            notify()->success($notification['message'],$notification['alert_type'],"topRight");
            return redirect()->route('roles.index')->with($notification);
        }else{
            $notification = [
                'alert_type' => 'Danger',
                'message' => "you can't delete system role"
            ];
            notify()->error($notification['message'],$notification['alert_type'],"topRight");
            return redirect()->route('roles.index')->with($notification);
        }

    }
}
