<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class Personel extends Controller
{
    public function index()
    {
        $data = User::where("id",'!=',auth()->user()->id)
        ->with(['roles' => function($query) {
            $query->select("name");
        }])
        ->paginate(20);

        return view("pages.personels.index",compact('data'));
    }

    public function create()
    {
        $roles = Role::pluck("name","id")->toArray();
        return view("pages.personels.create",compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required',
            'role'             => 'required',
            'email'            => 'required|email|unique:users',
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $role = Role::findByName($request->role);
        $user->assignRole($role);

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck("name","id")->toArray();

        return view("pages.personels.edit",compact('roles','user'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required',
            'role'             => 'required',
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

        $user = User::find($id);
        $user->name = $request->name;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->roles()->detach();
        $role = Role::findByName($request->role);
        $user->assignRole($role);

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Auth::invalidate($id);
        $user->delete();
        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }
}
