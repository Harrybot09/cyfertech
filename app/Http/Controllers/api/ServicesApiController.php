<?php

namespace App\Http\Controllers\api;
use App\Models\category;
use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ratesperuser;
use App\Models\Ratesperuserd;
use App\Models\Image;
use App\Models\Features;
use App\Models\Product;
use App\Models\Cart;
class ServicesApiController extends Controller
{
  public function products(Request $request){
      
      	 $validator=Validator::make($request->all(),[
            'id'=>'required',

        ]);

        if($validator->fails())
        {
            // echo $validator->errors();
            // die;
            return response()->json($validator->errors(),400);
        }
        else
        {  
            
	  $id = $request->id;
        $data=Ratesperuser ::orderBy('id','asc')
        ->select(['id','category_id','sku_code','name','price','image','no_of_users','description'])
        ->where('category_id',$id)
        ->get();
        return response()->json([
            'data'=>$data      
        ]); 
        }
    }

  public function productrate(Request $request){
      
      	 $validator=Validator::make($request->all(),[
            'id'=>'required',

        ]);

        if($validator->fails())
        {
            // echo $validator->errors();
            // die;
            return response()->json($validator->errors(),400);
        }
        else
        {  
         
         
	  $id = $request->id;
        $data=Ratesperuserd ::orderBy('id','asc')
        ->select(['id','product_id','sku_code','no_of_users','price'])
        ->where('product_id',$id)
        ->get();
        return response()->json([
            'data'=>$data      
        ]); 
        }
    }
	
	public function saveuserdetails(Request $request){
		 $validator=Validator::make($request->all(),[
            'address_1'=>'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'landmark' => 'required',
			'user_id'=>'required',

        ]);

        if($validator->fails())
        {
            // echo $validator->errors();
            // die;
            return response()->json($validator->errors(),400);
        }
        else
        {        
				$user =Address::create([
                 'address_1'=> $request->address_1,
                 'address_2'=> $request->address_2,
                 'country'  => $request->country,
                 'state'    => $request->state,
                 'city'     => $request->city,
                 'zip_code' => $request->zipcode,
                 'landmark' => $request->landmark,
                 'user_id'  => $request->user_id,
                ]);
				
                return response()->json([
                    'message' => 'Success',
                    'user' => $user
                ], 201);
          
        }
		
	}
	
  public function allproduct(){
	 
	  $data=Product::orderBy('id','asc')
        ->select(['cat_id','subcat_id','service_id','id','product','description','Image'])
       ->get();
	   
	   $ratearr = array();
	   
	   for($i=0; $i<count($data); $i++){
		   
		$data[$i]['rates'] =DB::table('ratesperuserd')
        ->select(['sku_code','price','no_of_users'])
        ->where('product_id',$data[$i]->id)
        ->get();
		
		 $data[$i]['image']=Image::orderBy('id','asc')
        ->select(['image'])
        ->where('product_id',$data[$i]->id)
        ->get();
		
		$data[$i]['features']=Features::orderBy('id','asc')
        ->select(['feature','description'])
        ->where('product_id',$data[$i]->id)
        ->get();
		
	   }
	   
         return response()->json([
            'data'=>$data      
        ]);  
    }	
	
	
	
	
	
	  public function productdata(Request $request){
	      
	      	$validator=Validator::make($request->all(),[
                'id' => 'required',
            ]);

        if($validator->fails())
        {
            // echo $validator->errors();
            // die;
            return response()->json($validator->errors(),400);
        }
        else
        { 
           
	  $id = $request->id;
	  
	  $data=Product::orderBy('id','asc')
        ->select(['id','product','description','Image'])
        ->where('service_id',$id)
        ->get();
			
		foreach($data as $rec){
			
		$data['rates']=DB::table('ratesperuserd')
        ->select(['sku_code','price','no_of_users'])
        ->where('product_id',$rec->id)
        ->get();	
		
		}
		foreach($data as $img){
			
		$data['images']=DB::table('images')
        ->select(['image'])
        ->where('product_id',$rec->id)
        ->get();	
		
		}		
		foreach($data as $feat){
			
		$data['features']=DB::table('features')
        ->select(['feature','description'])
        ->where('product_id',$rec->id)
        ->get();	
		
		}
		
	   /*$data=Ratesperuser::orderBy('id','asc')
        ->select(['name','description','image'])
        ->where('category_id',$id)
        ->first();
		
		$data['rates']=Ratesperuser ::orderBy('id','asc')
        ->select(['sku_code','price','no_of_users'])
        ->where('category_id',$id)
        ->get();
		
		$data['rates']=Ratesperuser ::orderBy('id','asc')
        ->select(['sku_code','price','no_of_users'])
        ->where('category_id',$id)
        ->get();
        $data['image']=Image ::orderBy('id','asc')
        ->select(['id','image'])
        ->where('service_id',$id)
        ->get();
		$data['features']=Features ::orderBy('id','asc')
        ->select(['id','feature','description'])
        ->where('service_id',$id)
        ->get();
	 */	
         return response()->json([
            'data'=>$data      
        ]);  
        }
    }


public function filterdata(Request $request){
	
	 $id = $request->id;
	  
	  $data=Product::orderBy('id','asc')
        ->select(['id','product','description','Image'])
        ->where('service_id',$id)
        ->get();
			
		foreach($data as $rec){
			$data['rates']=DB::table('ratesperuserd')
			->select(['sku_code','price','no_of_users'])
			->where('product_id',$rec->id)
			->get();	
		}
		foreach($data as $img){
		    $data['images']=DB::table('images')
			->select(['image'])
			->where('product_id',$rec->id)
			->get();	
		}		
		foreach($data as $feat){
			$data['features']=DB::table('features')
			->select(['feature','description'])
			->where('product_id',$rec->id)
			->get();	
		}
	
	 return response()->json([
            'data'=>$data      
        ]);
}


public function filterapi(Request $request){
	
	$arr = json_decode($request->data);
	//print_r($arr);
	
	$i=0;
	foreach($arr as $rec){
	 $data[$i]=DB::table('products')
        ->select(['id','cat_id','subcat_id','service_id','product','description','image'])
        ->where('cat_id',$rec->id)
        ->get();
		$x=0;
	 	foreach($data[$i] as $images){

		$imagesx[$x]=DB::table('images')
        ->select(['product_id','image'])
        ->where('product_id',$data[$i][$x]->id)
        ->get();
		
		
		$ratesperuserd[$x]=DB::table('ratesperuserd')
        ->select(['sku_code','price','no_of_users'])
        ->where('product_id',$data[$i][$x]->id)
        ->get();
		
		$features[$x]=DB::table('features')
        ->select(['feature','description'])
        ->where('product_id',$data[$i][$x]->id)
        ->get();
		
		$data[$i][$x]->rates = $ratesperuserd[$x];
		$data[$i][$x]->feature = $features[$x];
		$data[$i][$x]->images = $imagesx[$x];
		$x++;
		}
		
		
		
		$i++;
	}
	
	   return response()->json([
            'data'=>$data      
        ]);  
}



public function cartadd(Request $request){
$i=0;

$rec= json_decode($request->data);

//   	$validator=Validator::make($rec,[
//   	             'data'    => 'required|array|min:3',
//                  'data.*.id' => 'required',
//             ]);

        // if($validator->fails())
        // {
        //     // echo $validator->errors();
        //     // die;
        //     return response()->json($validator->errors(),400);
        // }
        // else
        // { 




foreach($rec as $data)
{
	
	$input['product_id'] =   $data->id;
    $input['category_id'] =  $data->category_id;
    $input['sku_code'] =     $data->sku_code;
    $input['name'] =         $data->name;
    $input['price'] =        $data->price;
    $input['image'] =        $data->image;
    $input['no_of_users'] =  $data->no_of_users;
    $input['description'] =  $data->description;
    $input['user_id'] =      $data->user_id;

    cart::create($input); 

}		

     		return response()->json([
                    'message' => 'Success',
              ], 201); 
       // }		
}

public function cartlist(Request $request){

    
	      	$validator=Validator::make($request->all(),[
                'user_id' => 'required',
            ]);

        if($validator->fails())
        {
            // echo $validator->errors();
            // die;
            return response()->json($validator->errors(),400);
        }
        else
        { 
           
           
$id = $request->user_id;
	  
	  $data=cart::orderBy('id','asc')
        ->select(['product_id','category_id','name','image','description','sku_code','price','no_of_users','user_id'])
        ->where('user_id',$id)
        ->get();
     		return response()->json([
                    'message' => 'Success',
					'data'=> $data
              ], 201); 
              
        }
			
}
}
