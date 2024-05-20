<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //All Permission
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('admin.backend.permission.all_permission', compact('permissions'));
    }

    //Add Permission
    public function AddPermission()
    {
        return view('admin.backend.permission.add_permission');
    }

    //Store Permission
    public function StorePermission(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('add.permission')->with($notification);
    }

    //Edit Permission
    public function EditPermission($id)
    {
        $edit = Permission::find($id);
        return view('admin.backend.permission.edit_permission', compact('edit'));
    }

    //Update Permission
    public function UpdatePermission(Request $request)
    {
        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.permission')->with($notification);
    }

    //Delete Permission
    public function DeletePermission($id)
    {
        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.permission')->with($notification);
    }

    ///// Role

    //All Role
    public function AllRole()
    {
        $roles = Role::all();
        return view('admin.backend.role.all_role', compact('roles'));
    }

    //Add Role
    public function AddRole()
    {
        return view('admin.backend.role.add_role');
    }

    //Store Role
    public function StoreRole(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('add.role')->with($notification);
    }

    //Edit Role
    public function EditRole($id)
    {
        $edit = Role::find($id);
        return view('admin.backend.role.edit_role', compact('edit'));
    }

    //Update Role
    public function UpdateRole(Request $request)
    {
        $per_id = $request->id;

        Role::find($per_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.role')->with($notification);
    }

    //Delete Role
    public function DeleteRole($id)
    {
        Role::find($id)->delete();

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('all.role')->with($notification);
    }

    //Add Roles Permission
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $permission_groups = User::getpermissionGroups();

        return view('admin.backend.rolesetup.add_roles_permission', compact('roles', 'permissions','permission_groups'));
    }

    //Roles Permission Store

    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    //All Roles Permission
    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('admin.backend.rolesetup.all_roles_permission', compact('roles'));
    }

    // Admin Edit Roles
    public function AdminRolesEdit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('admin.backend.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    }

    //AdminRolesUpdate
    public function AdminRolesUpdate(Request $request, $id){

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.roles.permission')->with($notification);

    }

    //Admin Roles Delete
    public function AdminRolesDelete($id){

        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }



}
