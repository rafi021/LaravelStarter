<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('dashboard.Profile.show', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
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
}
