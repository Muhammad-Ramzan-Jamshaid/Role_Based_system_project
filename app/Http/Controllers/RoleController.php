<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(2);
        return view('roles.list',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name','ASC')->get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique:roles,name|max:20'
        ]);

        if ($validator->passes()) {
            $role =Role::create([
                'name' => $request->name,
            ]);

            if (!empty($request->permissions)) {
                $role->syncPermissions($request->permissions);
            }
            return redirect()->route('roles.index')->with('success', 'roles created successfully!');
        } else {
            return redirect()->route('roles.create')
                             ->withInput()
                             ->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $roles = Role::findorFail($id);
       $haspermissions = $roles->permissions->pluck('name');
       $permissions = Permission::orderBy('name','ASC')->get();
       return view('roles.edit',compact('permissions','haspermissions','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id){
       
        $roles = Role::findorFail($id);
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique:roles,name,'.$id.',id'

        ]);

        if ($validator->passes()) {
                // Permission::create([
                //     'name' => $request->name,]);
                
                $roles->name = $request->name;
                $roles->save();
              
                if (!empty($request->permissions)) {
                    $roles->syncPermissions($request->permissions);
                }
                else{
                    $roles->syncPermissions([]);
                }

                return redirect()->route('roles.index')->with('success', 'Role updated successfully!');

        } else {
            return redirect()->route('permissions.edit',$id)     ->withInput()
                             ->withErrors($validator);
        }

          
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Role::findorFail($id);
        $roles->delete();

        return redirect()->route('roles.index')
        ->with('success', 'roles deleted successfully!');
    }
}
