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
        $data['register']=DB::table('register')->paginate(10); 
        return view('register.manage-register',$data);

        dd($data);
    }

    public function DeleteUser($id)
    {
        $dltuser=Register::find($id);
         $dltuser->delete();
        return redirect()->route('showusers')->with('success','User deleted successfully');

    }
	
	function subscriptions($id)
	{
		$subscription=DB::table('cart')->where('cart.id',$id)
		->join('products','products.id','=','cart.product_id')
        ->join('categories','categories.id','=','cart.category_id')
		->select('cart.sku_code as sku_code','cart.price as price','cart.no_of_users as no_of_users','cart.name as name','cart.image as image','cart.description as description','products.product as product','categories.name as cat_name')
		->get();
		return view('subscription.subscription',['subscription'=>$subscription]);
        
		
		//dd($subscription);
	}

}
