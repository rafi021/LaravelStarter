<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        //Gate::authorize('app.profile-index');
        $user = Auth::user();
        return view('dashboard.Profile.show', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        //Gate::authorize('app.profile-update');
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Check if file exits (Image Upload)
        if($request->hasFile('avatar')){
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Profile Updated'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('profile.show')->with($notification);
    }

    public function changePassword()
    {
        Gate::authorize('app.password-show');
        $user = Auth::user();
        return view('dashboard.Profile.changepassword',compact('user'));
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request, User $user)
    {
        Gate::authorize('app.password-update');
        $user = Auth::user();
        $hashedPassword = $user->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                notify()->success('Password Successfully Changed.', 'Success');
                return redirect()->route('login');
            } else {
                notify()->warning('New password cannot be the same as old password.', 'Warning');
            }
        } else {
            notify()->error('Current password not match.', 'Error');
        }
        return redirect()->back();
    }
}
