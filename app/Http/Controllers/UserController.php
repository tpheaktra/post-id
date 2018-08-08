<?php

namespace App\Http\Controllers;

use App\PermissionGroup;
use Illuminate\Http\Request;
use DB;
use App\Role;
use App\User;
use Hash;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.user-index');
    }

    public function getUserView(){
        $view = User::with('roles','user_group')->where('record_status',1)->get();
        foreach ($view as $i =>$v){
            $view[$i]->key  = $i+1;
            $view[$i]->view = route('user.getUserView', Crypt::encrypt($v->id));
            $view[$i]->edit = route('user.edit', Crypt::encrypt($v->id));
            $view[$i]->delete = route('user.delete', Crypt::encrypt($v->id));
        }
        return Datatables::of($view)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $groups = PermissionGroup::all();
        return view('admin.user-create',compact('roles','groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::connection();
        DB::beginTransaction();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm',
            'roles' => 'required',
            'groups' => 'required'
        ]);
        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            //user role
            foreach ($request->input('roles') as $key => $value) {
                $user->attachRole($value);
            }
            //user group
            foreach ($request->input('groups') as $key => $value) {
                DB::table('user_group')->insert(array('user_id'=>$user->id,'group_id'=>$value));
            }
            DB::commit();
            return redirect()->route('user.index')->with('success','Data Inset successfuly.');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with('danger','មិនអាចរក្សាទុកទិន្នន័យនៃការសម្ភាសន៍បានទេ');
        }

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
        $roles = Role::all();
        $groups = PermissionGroup::all();
        $user = User::find($id);
        $userRole = $user->roles->pluck('id','id')->toArray();


        $userGroup = User::with('user_group')->where('id',$id)->firstOrFail();
        $arr = [];
        foreach($userGroup->user_group as $user_group){
            $arr[] = $user_group->pivot->group_id;
        }
        //echo json_encode($arr);
       // echo json_encode($userGroup);exit();
        //echo $userGroup['user_group'];
        //echo $userGroup['user_group'][0]->id;


        return view('admin.user-edit',compact('user','roles','groups','userRole','arr'));

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
        //
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
        DB::table("users")->where('id',$id)->update(array('record_status'=>0));
        return back()->with('success','User delete successsfuly');
    }
}