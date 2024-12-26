<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TelegramUsers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Users extends Controller
{
    private User $user;
    private Role $role;

    public function index()
    {
        // $this->assignRole();

        $data = TelegramUsers::searchfields()->paginate(20);
        return view('pages.users.index',compact('data'));
    }

    public function assignRole()
    {
        $this->user = User::where("id",2)->first();
        $this->role = Role::findByName('Editor');
        $this->user->assignRole($this->role);

        // $this->role->givePermissionTo([
        //     'view-personel',
        //     'create-personel',
        //     'edit-personel',
        //     'delete-personel',
        //     'permission-management',
        //     'role-management',
        //     'view-users',
        //     'edit-users',
        //     'create-users',
        //     'delete-users',
        //     'view-question',
        //     'create-question',
        //     'edit-question',
        //     'delete-question',
        //     'view-category',
        //     'create-category',
        //     'edit-category',
        //     'delete-category'
        // ]);

        // $user = User::where("id",2)->first();
        // $user->assignRole('Editor');
    }

    public function removeRole()
    {
        // $user = User::where("id",1)->first();
        // $user->removeRole('Admin');
    }

    public function givePermissionTo()
    {
        // $role = Role::findByName('Admin');
        // $role->givePermissionTo([
        //     'create-blog-posts',
        //     'edit-blog-posts',
        //     'delete-blog-posts',
        // ]);

    }

    public function revokePermissionTo()
    {
        // $user->revokePermissionTo('edit-users');
    }

    // personel
    public function profile()
    {
        $user = auth()->user();
        return view("pages.profile.index",compact("user"));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required',
            'password'         => [
                'nullable',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password_confirm' => 'nullable|same:password'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $id = auth()->user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }
}
