<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
        public function index()
{
    $permissions = Permission::all();
    return view('permissions.index', compact('permissions'));
}




    public function create(){
         return view('permissions.create');
    }



    public function store(Request $request){
     $validated = $request->validate([
         
        'name'=>'required|unique:permissions,name|max:10'
     ]); 
     Permission::create([
        'name' => $validated['name'],
    ]);

    // Redirect with success message
    return redirect()->route('permissions.create')->with    ('success', 'Permission created successfully!');
}


    public function edit(){

    }



    public function update(){

    }




    public function destroy(){

    }
}
