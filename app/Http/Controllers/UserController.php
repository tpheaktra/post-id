<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\model\RoleUserModel;
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

        $dataUser = User::orderBy('id','DESC')->with('roles','user_group')->where('record_status',1)->get();
     //   echo json_encode($dataUser);exit();
        return view('admin.user-index',compact('dataUser'));
    }

//    public function getUserView(){
//        $view = User::with('roles','user_group')->where('record_status',1)->get();
//       // echo json_encode($view);exit();
//        //echo dd($view[0]['roles'][0]->name);exit();
//        foreach ($view as $i =>$v){
//            $view[$i]->id  = $v->id;
//            $view[$i]->key  = $i+1;
//            $view[$i]->view = route('user.getUserView', Crypt::encrypt($v->id));
//            $view[$i]->edit = route('user.edit', Crypt::encrypt($v->id));
//            $view[$i]->delete = route('user.delete', Crypt::encrypt($v->id));
//        }
//        return Datatables::of($view)->make(true);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $groups = PermissionGroup::all();
        $hospital = Helpers::getHospital();

        return view('admin.user-create',compact('roles','groups','hospital'));
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
            'name'       => 'required',
            'username'   => 'required|unique:users,username',
            'hospital'   => 'required',
            'date_join'  => 'required',
            'password'   => 'required|same:confirm',
            'roles'      => 'required',
            'groups'     => 'required'
        ]);
        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['profile']  = 'avatar5.png';
            $user = User::create($input);
            //user_hospital
            foreach ($request->input('hospital') as $key => $uhospital) {
                DB::table('user_hospital')->insert(array('hospital_id'=>$uhospital,'user_id'=>$user->id));
            }
            //user role
            foreach ($request->input('roles') as $key => $value) {
                $user->attachRole($value);
            }
            //user group
            foreach ($request->input('groups') as $key => $value) {
                DB::table('user_group')->insert(array('user_id'=>$user->id,'group_id'=>$value));
            }
            DB::commit();
            return redirect()->route('user.index')->with('success','អ្នក​ប្រើប្រាស់​បង្កើតបានជោគជ័យ');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with('danger',' អ្នក​ប្រើប្រាស់​បង្កើតមិនបានជោគជ័យទេ');
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
       // $hospital = User::pluck('name','id');
       // dd($hospital);
        $hospital = Helpers::getHospital();
//        foreach ($getHop as $h){
//            $hospital[$h->od_code]=$h->name_kh;
//        }
        //$hospital = json_encode($hospital1);
      //  echo json_encode($hospital);
      //  $selectedRoles = $hospital->pluck('od_code','name_kh');
       // $hospital = $hospital::lists('id', 'name');
        $hop =[];
        $checkHospital = DB::select('select * from user_hospital where user_id ='.$id);
        foreach($checkHospital as $hh){
            $hop[] = $hh->hospital_id;
        }
//var_dump($hospital);exit();
        return view('admin.user-edit',compact('user','roles','groups','userRole','arr','hospital','hop'));

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
            'name'     => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'hospital'   => 'required',
            'date_join'  => 'required',
           // 'password' => 'required|same:confirm',
            'roles'    => 'required',
            'groups'   => 'required'

        ]);
        try {
            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = array_except($input, array('password'));
            }

            $user = User::find($id);
            $user->update($input);
            //user_hospital
            DB::table('user_hospital')->where('user_id', $id)->delete();
            foreach ($request->input('hospital') as $key => $uhospital) {
                DB::table('user_hospital')->insert(array('hospital_id'=>$uhospital,'user_id'=>$user->id));
            }

            //role
            RoleUserModel::where('user_id', $id)->delete();
            foreach ($request->input('roles') as $key => $value) {
                $user->attachRole($value);
            }

            //user group
            DB::table('user_group')->where('user_id', $id)->delete();
            foreach ($request->input('groups') as $key => $value) {
                DB::table('user_group')->insert(array('user_id' => $user->id, 'group_id' => $value));
            }
            DB::commit();
            return redirect()->route('user.index')->with('success','ការធ្វើបច្ចប្បន្នភាពបានជោគជ័យ');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->with('danger','ការធ្វើបច្ចប្បន្នភាពមិនបានជោគជ័យទេ');
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
        DB::table("users")->where('id',$id)->update(array('record_status'=>0));
        return back()->with('success','លុបអ្នកប្រើប្រាស់​បានជោគជ័យ');
    }
}