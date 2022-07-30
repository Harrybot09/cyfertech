<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class CartApiController extends Controller{
	
public function cartadd(Request $request)
    {
       dd($request->data);
       /*   $validator=Validator::make($request->all(),[
                'category_id' => 'required|integer|min:50',
                'sku_code' => 'required',
                'price' => 'required',
				'no_of_users'=>'required',
				//'total'=>'required'
            ]);
			 if($validator->fails())
        {
            
            return response()->json($validator->errors(),400);
        }
       else{
            $insert = new Cart;
            $insert->category_id = $request->category_id;
            $insert->product_id = $request->id;
            $insert->sku_code =  $request->sku_code;
            $insert->price = $request->price;
            $insert->no_of_users = $request->no_of_users;
            $insert->user_id = $request->user_id;
            $insert->save(); 
			 return response()->json([
                    'message' => 'Success',
                    'user' => $user
                ], 201);
        } */
      
      
    }
	
	
    public function cartcounter()
    {
       /*  $uid = Session::get('id');
        $count = Cart::where('user_id', $uid)->count();
        echo $count; */
    }
	
	
    public function addtocart(Request $request)
    {
        /* $uid = Session::get('id');
        $show = Cart::join('products', 'products.id', 'cart.product_id')
            ->select('cart.*', 'products.p_name', 'products.featured_image')
            ->where('user_id', $uid)
            ->get();
        return view('website.add-to-cart', compact('show')); */
    }
	
    public function cartdetails()
    {
        /* $uid = Session::get('id');
        $show = Register::select('*')
            ->where('id', $uid)
            ->get();
        $billshow = Billing::select('*')
            ->where('user_id', $uid)
            ->get();
        $country = Country::get();
        $state = State::get();
        return view('website.cart-detail', compact('show', 'billshow','country','state')); */
    }
	
    public function cartdelete(Request $request)
    {
        $delete = Cart::where('id', $request->pid)->delete();
        echo "done";
    }
	
    public function cartupdate(Request $request)
    {
        /* $ctotal = $request->quantity * $request->price;
        $update = Cart::where('id', $request->pid)->update(["quantity" => $request->quantity, "cart_total" => $ctotal]);
        $subtotal =  Cart::where('user_id', Session::get('id'))->sum('cart_total');
        //echo "done";
         return response()->json([
                'total' => $subtotal,
                'status' => 'done',
            ]); */
    }
	
	}