<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleManagement extends Controller
{
    public function index()
    {
        $data = Role::select("name","id")->with(['permissions' => function($query){
            $query->select("id","name","section");
        }])->paginate(20);

        $permissions = Permission::select("name","section")
        ->get()
        ->groupBy("section")
        ->toArray();

        return view("pages.roles.index",compact('data','permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Role::create(['name' => $request->name]);

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $role = Role::find($id);

        $role->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }

    public function updatePermission(Request $request,$id)
    {
        $permissions = [];
        foreach ($request->all() as $key => $value) {
            if($key !='_token' && $key !='_method')
                $permissions[] = $key;
        }

        $role = Role::find($id);
        if($role) {
            $role->syncPermissions([]);
        }

        $role->givePermissionTo($permissions);

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->back()->with('message','عملیات با موفقیت انجام شد.');
    }
}
