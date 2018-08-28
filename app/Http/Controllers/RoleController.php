<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use DB;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role-index',compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions    = Permission::all();
        $permission_sub = DB::select('select distinct parent_id From permissions');
        return view('admin.role-create',compact('permissions','permission_sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name'         => 'required|unique:roles,name',
            'display_name' => 'required',
            'permission'   => 'required',

        ]);
        $role = Role::create($request->except(['permission','_token']));

        foreach($request->permission as $key=> $value){
            $role->attachPermission($value);
        }

        return redirect()->route('role.index')->with('success','Data Inset successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $role = Role::find($id);
        $permissions = Permission::all();
        $role_permissions = $role->perms()->pluck('id','id')->toArray();
        $permission_sub = DB::select('select distinct parent_id From permissions');
        return view('admin.role-edit',compact('permissions','role','role_permissions','permission_sub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::connection();
        DB::beginTransaction();
        $id = Crypt::decrypt($id);
        $this->validate($request, [
            'display_name' => 'required',
            'name' => 'required|unique:roles,name,'.$id,
            'permission'   => 'required',
        ]);
        try {
            $role = Role::find($id);
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->save();
            DB::table("permission_role")->where('role_id',$id)->delete();
            foreach($request->permission as $key=> $value){
                $role->attachPermission($value);
            }
            DB::commit();
            return redirect()->route('role.index')->with('success','Data bas been update successsfuly.');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with('danger','Data can not update.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        DB::table("roles")->where('id',$id)->delete();
        return back()->with('success','Data delete successsfuly');
    }
}