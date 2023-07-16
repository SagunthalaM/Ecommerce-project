<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB;
use Session;
/***********here I made a huge mistake putting yajra in small letter
 * so it does not work and it again and again shows error error
 */
//use yajra\DataTables\Facades\DataTables;
/**
 * ordered line
 */
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    public function index(Request $request){
        if($request->ajax()){
           // $data = User::all();
           $data = User::latest()->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions',function($user){
                return '<head>
                <!-- Bootstrap-->
                 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
                 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
 
                <!-- Font awesome -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            
            </head>
                
                <a href="'.route('admin.user.edit', $user->id).'"
                 class="text-decoration-none me-3" style="color:black;" >
                <i class="fa-solid fa-pen-to-square fs-5"></i> 
                </a>
                
                <form action="'.route('admin.user.delete', $user->id).'" method="POST" style="display: inline">
                '.csrf_field().'
                '.method_field('DELETE').'
                <button type="submit" class="btn  py-0 px-0"
                 onclick="return confirm(\'Are you sure to delete user?\')">
                 <i class="fa-solid fa-trash fs-5"></i> 
                 </button>
            </form>
                ';

            })->rawColumns(['actions'])
            ->make(true);
        }
        return view('admin.user.index');
    }
    
    public function AddUserIndex(){
        //$all = DB::table('users')->get();
        return view('admin.user.add');
    }  
    public function InsertUser(Request $request){
        $request->validate([
                'username'=>'required|regex:/^[^\d]+$/|string',
                'email'=>'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/|unique:users',
                'password'=>'required|min:8|confirmed|',
                'role'=>'required'     
        ]);
        $data=[];
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);

        $insert = DB::table('users')->insert($data);
        if($insert){
          Session::flash('success', 'User Created successfully!');
          return back();
           //return redirect('admin/users');
        }
        else{
            echo "something is wrong";
        }
    }
    public function EditUser($id)
    {
       // $edit = DB::table('users')->where('id',$id)->first();
    
        try {
            $edit = User::findOrFail($id);
            $id = $edit->id;
            return view('admin.user.edit',compact('edit'));
        } catch (ModelNotFoundException $exception) {
            return response()->view('errors.user_not_found', [], 404);
        }
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
            Session::flash('success','User Updated Successfully!');
             
            return back();
           // return redirect('admin/users')->with('success','user updated successfully');
        }
        else{
            echo "something is wrong";
        }
    }
   

        public function getUser($id)
        {
            try {
                $show_user = User::findOrFail($id);
                $id = $show_user->id;
                return view('admin.user.get_user',compact('show_user'));
            } catch (ModelNotFoundException $exception) {
                return response()->view('errors.user_not_found', [], 404);
            }

             $show_user = User::findOrFail($id);
            return view('admin.user.get_user',compact('show_user'));
        }
        public function DeleteUser($id){
            $delete = DB::table('users')->where('id',$id)->delete();
            if($delete)
            {
                Session::flash('danger', 'Record deleted successfully.');

                // Redirect back to the previous page or any other desired route
                return redirect()->back();
               // return redirect('admin/users')->with('success','user deleted successfully');;
            // echo 'User Successfully Deleted';
            }
            else{
                echo "Something is wrong";
            }

        }
}
