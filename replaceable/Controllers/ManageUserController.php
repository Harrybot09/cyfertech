<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Register;

use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function showuser()
    {
        // $data['register']=Register::orderBy('id','desc')->paginate(5);
        $data['register']=DB::table('register')->paginate(5); 
        return view('register.manage-register',$data);

        dd($data);
    }

    public function DeleteUser($id)
    {
        $dltuser=Register::find($id);
         $dltuser->delete();
        return redirect()->route('showusers')->with('success','User deleted successfully');

    }

}
