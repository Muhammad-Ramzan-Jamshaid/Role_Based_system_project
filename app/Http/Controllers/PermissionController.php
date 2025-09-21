<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;   
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
        public function index()
    {
        return view('permissions.list');

         }



    public function create(){
         return view('permissions.create');
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique:permissions,name|max:20'
        ]);

        if ($validator->passes()) {
            Permission::create([
                'name' => $request->name,
            ]);
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
        } else {
            return redirect()->route('permissions.create')
                             ->withInput()
                             ->withErrors($validator);
        }
    }


    public function edit(){

    }



    public function update(){

    }


    public function destroy(){

    }
}
