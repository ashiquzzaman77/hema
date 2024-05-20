<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //User Dashboard
    public function UserDashboard()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.user.user_dashboard', compact('profileData'));
    }

    //User Profile
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('frontend.user.user_profile', compact('profileData'));
    }

    //User Profile Update
    public function UserProfileUpdate(Request $request)
    {

        $validateData = $request->validate(
            [
                'photo' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $id = Auth::user()->id;
        $update = User::findOrFail($id);

        $update->name = $request->name;
        $update->last_name = $request->last_name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/' . $update->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();

        notify()->success('Profile Update Successfully');

        return redirect()->back();

    }

    //Change Password
    public function UserPassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('frontend.user.user_password', compact('profileData'));
    }

    public function UserPasswordUpdate(Request $request)
    {
        ///validate
        $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers(),

            ],
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            connectify('error', 'Connection Not Found', 'Old Password Not Match');

            return redirect()->back();
        }

        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        connectify('success', 'Connection Found', 'Password Change Successfully');

        return redirect()->back();
    }

    //User Logout
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // $notification = array(
        //     'message' => 'Logout Successfully',
        //     'alert-type' => 'info',
        // );

        notify()->success('Logout Successfully');

        return redirect()->route('index');
    }
}
