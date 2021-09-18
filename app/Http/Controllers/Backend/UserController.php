<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.access-user');

        $users = User::with(['role'])->get();
        // $canedit = Auth::user()->hasPermission('app.edit-user');
        // $candelete = Auth::user()->hasPermission('app.delete-user');
        return view('dashboard.User.index', compact('users',
        //'canedit',
        //'candelete'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.create-user');
        $roles = Role::all();
        return view('dashboard.User.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        Gate::authorize('app.create-user');
        //dd($request->all());
        $user = User::create([
            'role_id' => $request->role_name,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->filled('status'),
        ]);
        $notification = [
            'alert_type' => 'Success',
            'message' => 'User Created Successfully!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('app.delete-user');
        if($user->role->deleteable){
            $user->delete();
            $notification = [
                'alert_type' => 'Success',
                'message' => 'User Deleted Successfully!!'
            ];
            notify()->success($notification['message'],$notification['alert_type'],"topRight");
            return redirect()->route('users.index')->with($notification);
        }else{
            $notification = [
                'alert_type' => 'Danger',
                'message' => "you can't delete system User"
            ];
            notify()->error($notification['message'],$notification['alert_type'],"topRight");
            return redirect()->route('users.index')->with($notification);
        }
    }
}
