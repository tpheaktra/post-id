<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\User;
use Hash;
use auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(){
        $id = auth::user()->id;
        $logo = User::findOrFail($id);

        return view('admin.profile-index',compact('logo'));
    }


    public function UpdatedProfile(request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        if(\Request::input('old_password')) {
            $this->validate($request, [
                'old_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|different:old_password',
                'confirm_password' => 'required_with:password|same:password|string|min:6'
            ]);
        }
        $id = auth::user()->id;
        $input = User::find($id);

        $input->name                = $request->name;
        $input->phone               = $request->phone_number;
        $input->address             = $request->address;
        $input->dob                 = date('Y-m-d', strtotime($request->date_of_birth));



        if($request->hasFile('profile')) {
            $file             = $request->profile;
            $timestamp        = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name             = $timestamp. '-' .$file->getClientOriginalName();
            $input->profile   = $name;
            $file->move(public_path('/upload'), $name);
        }





       // try {

           // $input = User::findOrFail($id);
           // $input->updated_by      = auth::user()->id;

            //check password
            if(\Request::input('old_password')) {
                if (Hash::check($request->get('old_password'), Auth::user()->password)) {
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($request->get('password'));
                    if ($user->save()) {
//                        return response()->json([
//                            //'data' => new UserResource($input),
//                            'message' => 'Your password  has been updated',
//                        ], 200);
                        return back()->with('success',trans('អ្នកបានធ្វើបច្ចុប្បន្នភាពដោយជោគជ័យ'));
                    }
                } else {
                    return back()->with('danger',trans('បញ្ចូលពាក្យសម្ងាត់ចាស់មិនត្រឹមត្រូវ'));
                }
            }

//        } catch (Exception $e) {
//            return response()->json([
//                'errors' => $e->getMessage(),
//                'message' => 'Please try again',
//                'status' => false
//            ], 200);
//        }

        $input->save();
        return back()->with('success',trans('អ្នកបានធ្វើបច្ចុប្បន្នភាពដោយជោគជ័យ'));
    }

}