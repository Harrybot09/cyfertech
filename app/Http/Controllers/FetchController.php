<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\subcategory;
use App\Models\area;
use App\Models\category;
use App\Models\Product;

use App\Models\Ratesperuserd;
use App\Models\Ratesperuser;
class FetchController extends Controller
{
    public function myform()
    {
        $states = DB::table("city")->paginate(5); 
        return view('test',compact('states'));
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        
        $cities = DB::table("area")
                    ->where("city_id",$id)
                    ->select('id','name')->get();
                    
        return json_encode($cities);
        // return $cities;
    }
	/* 
	public function getcategory(Request $request){

		$id = $request->cat;
		
        $subcategory = DB::table("categories")
					->where('parent_category_id', $id)
                    ->select('id','name')->get();
		 foreach($subcategory as $row){
            echo '<option value="'.$row->id.'">'.' '.$row->name.'</option>';
            getcategory($row->id, ' '.'---');
        }			
              
       // return json_encode($subcategory);
	} 
	
	
/* 	public function getcategory($id, $sub_mark = ''){

		
		
        $subcategory = DB::table("categories")
					->where('parent_category_id', $id)
                    ->select('id','name')->get();
		 
		 foreach($subcategory as $row){
            echo '<option value="'.$row->id.'">'.$sub_mark.$row->name.'</option>';
					self::getcategory($row->id, $sub_mark.'---');
        } 		
              
       // return json_encode($subcategory);
	}
	 */
	
	
		public function getsubcategory(Request $request){

		 $id = $request->cat;
		
        $subcategoryx = DB::table("categories")
                    ->where("parent_category_id",$id)
                    ->select('id','name')->get();
              
        return json_encode($subcategoryx);
	}
    
	  public function getservice($category, $sub_mark = ''){
	         
        $sub = DB::table("categories")
                    ->where("parent_category_id",$category)
                    ->select('id','name')->get();
              
		 foreach($sub as $row){

            echo '<option value="'.$row->id.'">'.$sub_mark.$row->name.'</option>';
					self::getservice($row->id, $sub_mark.'---');
        } 		
       // return json_encode($subcategory);
	}
	
	public function servicesubcat(Request $request){

		$id = $request->cat;
		
        $subcategory = DB::table("service_category")
                    ->where("service_id",$id)
                    ->select('id','name')->get();
              
			  
        return json_encode($subcategory);
	}
	
     public function serviceproduct(Request $request){
		$category = DB::table('categories')->whereNull('parent_category_id')->get();
	//	$subcategory = DB::table('subcategory')->get();
		 return view('services.add-product',['category' => $category]);
		
		
	 }
	 
	 	 public function features(){
		  
		$products = DB::table('products')->get();
		 return view('services.add-features',['products' => $products]);
		
	 }
	 
	 
	 public function savefeatures(Request $request){
		  $cc = count($request->feature);
		  dd($request->all());
		 $product_id = $request->input('product_id');
		 for ($i=0; $i <$cc ; $i++) {
		   
		   $feature = $request->input('feature');
		   $description = $request->input('description');
		   $dataxf=array('product_id'=>$id,"feature"=>$feature[$i],"description"=>$description[$i]);
           DB::table('features')->insert($dataxf);
		  
		}
		$products = DB::table('products')->get();
		return redirect()->route('features')
        ->with('success','Features has been created successfully.',['products' => $products]);
	 }
   
       public function saveserviceproduct(Request $request){
		   
		  
		/* $cat_id = $request->input('cat_id');
		   $subcat_id = $request->input('subcat_id');
		   $service_id = $request->input('service_id');
		   $name = $request->input('name');
		
		
		$name1=category::orderBy('id','asc')
        ->select(['name'])
        ->where('id',$category_id)
        ->first();
		
		$name2=category::orderBy('id','asc')
        ->select(['name'])
        ->where('id',$service_id)
        ->first(); 
		 $name = $name1->name.' '.$name2->name.' '.$request->input('name');	  */
		  $cat_id = $request->input('cat_id');
		   $subcat_id = $request->input('subcat_id');
		   $service_id = $request->input('service_id');
		   $name = $request->input('name');
		   $description = $request->input('description');
		   $cc = count($request->sku_id);
		
		if ($image = $request->file('image')) {
                 $profileImage = time().'.'.$request->image->extension();
                 $request->image->move(public_path('uploads'), $profileImage);
                 $imagex = "$profileImage";
        }
   
        $data=array('cat_id'=>$cat_id,"subcat_id"=>$subcat_id,"service_id"=>$service_id,"product"=>$name,"description"=>$description,"image"=>$imagex);
        DB::table('products')->insert($data);
		$id = DB::getPdo()->lastInsertId();;

		for ($i=0; $i <$cc ; $i++) {
			$sku_id = $request->input('sku_id');
			$price = $request->input('price');
			$no_of_user = $request->input('no_of_user');
			$datax=array('product_id'=>$id,"sku_code"=>$sku_id[$i],"price"=>$price[$i],"no_of_users"=>$no_of_user[$i]);
          
		 Ratesperuserd::create($datax);
		}

		$category = DB::table('category')->get();
		$subcategory = DB::table('subcategory')->get();
		return redirect()->route('serviceproduct')
                        ->with('success','category has been created successfully.',['category' => $category,'subcategory' => $subcategory]);
	 }
	 
	 public function manageproduct()
	 {
		 
	 }
	 
	 
	 
	 
	 
	 
	 
}
