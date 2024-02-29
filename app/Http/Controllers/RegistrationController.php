<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function roles() {
        $roles = Role::where('status', 2)->get();
        return view('roles.role', compact('roles'));
    }

    public function rolesAdd() {
        $permissions = Permission::where('status', 2)->get();
        return view('roles.roleForm', compact('permissions'));
    }

    public function roleCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'roleName' => 'required|string',
            'displayName' => 'required|string',
            'id' => 'sometimes|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        $name = $request->roleName;
        $displayName = $request->displayName;

        $permissions = Permission::where('status', 2)->get();

        $id = isset($request->id) ? $request->id : '';

        if ($id == '') {
            $role = new Role();
        } else {
            $role = Role::find($id);
        }

        $role->name = $name;
        $role->display_name = $displayName;
        if ($role->save()) {
            foreach ($permissions as $key => $values) {
                $permission = RolePermission::where('role_id', $role->id)->where('permission_id', $values->id)->first();

                if ($permission) {
                    $permissions = RolePermission::find($permission->id);
                } else {
                    $permissions = new RolePermission();
                }

                $permissions->role_id = $role->id;
                $permissions->permission_id = $values->id;
                $right = $values->name.'_'.$key;
                $permissions->right = (int)$request->$right;

                $permissions->save();
            }
        } else {
            return redirect()->back()->with('error', 'Database error.');
        }

        return redirect('roles')->with('success', 'Save Successfully');
    }

    public function viewRole($id) {
        $role = Role::where('id', $id)->first();
        return view('roles.viewRole', compact('role'));
    }

    public function editRole($id) {
        $role = Role::where('id', $id)->with('rolePermission', 'rolePermission.permission')->first();
        $permissions = Permission::where('status', 2)->get();
        return view('roles.editRole', compact('role', 'permissions'));
    }

    public function deleteRole($id) {
        $deleteRole = Role::where('id', $id)->delete();
        $deletePermission = RolePermission::where('role_id', $id)->delete();
        return redirect('roles')->with('success', 'Delete Successfully');
    }

    public function listUser() {
        $user = User::with(['role', 'language'])->get();
        return view('users.listUser', compact('user'));
    }

    public function usersAdd() {
        $role = Role::where('status', 2)->get();
        $language = Language::where('status', 2)->get();
        return view('users.addUser', compact('role', 'language'));
    }

    public function userCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'nullable|required_if:id,null',
            'role' => 'required',
            'language' => 'required',
            'avatar' => 'sometimes|required|file|image|mimes:png,jpg,jpeg|max:5000',
            'id' => 'sometimes|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }

        $fileName = null;
        if (isset($request->avatar)) {
            $file = $request->avatar;
            $fileName = $file->getClientOriginalName();

            $file->move(public_path('uploads/avatars'), $fileName);
        }

        if (isset($request->id)) {
            $user = User::find($request->id);
        } else {
            $user = new User;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);    
        }
        
        $user->role_id = $request->role;
        $user->language_id = $request->language;
        if ($fileName != null) {
            $user->profile = $fileName;
        }
        if ($user->save()) {
            return redirect('listUser')->with('success', 'User Added');
        } else {
            return redirect()->back()->with('error', 'Some error occured');
        }
    }

    public function viewUser($id) {
        $user = User::where('id', $id)->with(['role', 'language'])->first();
        return view('users/viewUser', compact('user'));
    }

    public function editUser($id) {
        $user = User::where('id', $id)->with(['role', 'language'])->first();
        $role = Role::where('status', 2)->get();
        $language = Language::where('status', 2)->get();
        return view('users/editUser', compact('user', 'role', 'language'));
    }

    public function deleteUser($id) {
        $delete = User::where('id', $id)->delete();
        return redirect('listUser')->with('success', 'Delete Successfully');
    }
}
