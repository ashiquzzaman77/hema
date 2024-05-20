<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    //Admin Dashboard
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    //Admin Logout
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

    //Admin Login
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    //Admin Profile
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));

    }

    //Admin Profile Store
    public function AdminProfileStore(Request $request)
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
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);

    }

    //Admin Change Password
    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    //Admin Password Update
    public function AdminPasswordUpdate(Request $request)
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

    //All Vendor
    public function AllVendor()
    {
        $allclient = User::where('role','vendor')->latest()->get();
        return view('admin.backend.client.all_vendor', compact('allclient'));
    }

    //Inactive Vendor
    public function InactiveVendor($id)
    {
        User::find($id)->update([

            'status' => 'inactive',

        ]);

        $notification = array(
            'message' => 'Vendor Inactive Successfully',
            'alert-type' => 'info',
        );

        return back()->with($notification);

    }

    //Active Vendor
    public function ActiveVendor($id)
    {
        User::find($id)->update([

            'status' => 'active',

        ]);

        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'info',
        );

        return back()->with($notification);

    }

    //All User
    public function AllUser()
    {
        $allclient = User::where('role','user')->latest()->get();
        return view('admin.backend.client.all_user', compact('allclient'));
    }

    //All Contact
    public function AllContact()
    {
        $contact = Contact::latest()->get();
        return view('admin.backend.contact.all_contact', compact('contact'));
    }

    //Delete Contact
    public function DeleteContact($id)
    {
        Contact::find($id)->delete();

        $notification = array(
            'message' => 'Contact Delete Successfully',
            'alert-type' => 'info',
        );

        return back()->with($notification);
    }

    //All Subscribe
    public function AllSubscribe()
    {
        $subscribe = Subscribe::latest()->get();
        return view('admin.backend.subscribe.all_subscribe', compact('subscribe'));
    }

    //Delete Subscribe
    public function DeleteSubscribe($id)
    {
        Subscribe::find($id)->delete();

        $notification = array(
            'message' => 'Subscribe Delete Successfully',
            'alert-type' => 'info',
        );

        return back()->with($notification);
    }

    //All User
    public function AllAdmin()
    {
        $alladmin = User::where('role','admin')->latest()->get();
        return view('admin.backend.admin.all_admin', compact('alladmin'));
    }

    //Add User
    public function AddAdmin()
    {
        $roles = Role::all();
        return view('admin.backend.admin.add_admin',compact('roles'));
    }

    //Store Admin
    public function StoreAdmin(Request $request){

        $user = new User();
        $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin Inserted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.admin')->with($notification);

    }

    //EditAdmin
    public function EditAdmin($id){

        $user = User::find($id);
        $roles = Role::all();

        return view('admin.backend.admin.edit_admin',compact('user','roles'));

    }

    //UpdateAdmin
    public function UpdateAdmin(Request $request,$id){

        $user = User::findOrFail($id);
        $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
                'message' => 'New Admin Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin')->with($notification);

    }

    //Delete Admin
    public function DeleteAdmin($id){

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
                'message' => 'New Admin Deleted Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);

      }


}
