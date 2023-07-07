<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
       public function AddUserIndex(){
        //$all = DB::table('users')->get();
        return view('admin.user.add');
    }  
    public function InsertUser(Request $request){
        $data=[];
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);

        $insert = DB::table('users')->insert($data);
        if($insert){
        return redirect('admin/users');
            
            //echo "successfull";
        }
        else{
            echo "something is wrong";
        }
    }
    public function EditUser($id)
    {
        $edit = DB::table('users')->where('id',$id)->first();
        return view('admin.user.edit',compact('edit'));
    }
    public function UpdateUser(Request $request,$id)
    {
        $data=[];
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        $update = DB::table('users')->where('id',$id)->update($data);
        if($update){
            //return redirect('all-user'); 
            return redirect('admin/users')->with('success','Success!user updated');
            
            //echo "User updated successfully";
        }
        else{
            echo "something is wrong";
        }
    }
        public function DeleteUser($id){
            $delete = DB::table('users')->where('id',$id)->delete();
            if($delete)
            {
                return redirect('admin/users');
            // echo 'User Successfully Deleted';
            }
            else{
                echo "Something is wrong";
            }

        }
}
