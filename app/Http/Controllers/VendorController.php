<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class VendorController extends Controller
{
    //Vendor Dashboard
    public function VendorDashboard()
    {
        return view('vendor.index');
    }

    //Vendor Logout
    public function VendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

    //Vendor Login
    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    }

    //Vendor Register
    public function VendorRegister()
    {
        return view('vendor.vendor_register');
    }

    //Vendor Register Store
    public function VendorRegisterStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Register Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('vendor.login')->with($notification);
    }

    //Vendor Profile
    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('vendor.vendor_profile_view', compact('profileData'));

    }

    //Vendor Profile Store
    public function VendorProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $filename);
            $data['photo'] = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);

    }

    //Vendor Change Password
    public function VendorChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('vendor.vendor_change_password', compact('profileData'));
    }

    //Vendor Password Update
    public function VendorPasswordUpdate(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error',
            );

            return back()->with($notification);

        }

        /// Update The New Password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'info',
        );

        return back()->with($notification);

    }
}
