<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;   
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
        public function index()
    {
        // $permissions = Permission::orderBy('created_at','DESC')->paginate(1);
        // return view('permissions.list',[
        //     'permissions'=>$permissions
        // ]);

 $permissions = Permission::paginate(6);
 return view('permissions.list',compact('permissions'));
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


    public function edit($id){
       $permissions = Permission::findorFail($id);
       return view('permissions.edit',compact("permissions"));
  
    }



    public function update(Request $request,$id){
       
        $permissions = Permission::findorFail($id);
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique:permissions,name,'.$id.',id'
        ]);

        if ($validator->passes()) {
                // Permission::create([
                //     'name' => $request->name,]);
                
                $permissions->name = $request->name;
                $permissions->save();


            return redirect()->route('permissions.index')->with('success', 'Permission Updated successfully!');
        } else {
            return redirect()->route('permissions.edit',$id)
                             ->withInput()
                             ->withErrors($validator);
        }

          
    }


    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
    
        return redirect()->route('permissions.index')
                         ->with('success', 'Permission deleted successfully!');
    }
    
}
