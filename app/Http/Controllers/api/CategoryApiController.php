<?php

namespace App\Http\Controllers\api;
use App\Models\category;
use App\Models\subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class CategoryApiController extends Controller
{
    public function index(){
		$alldata = category::categorytree();
          return response()->json([
          'data'=>$alldata
        ]); 
    }

  public function subcat(Request $request){
      
      
      $validator=Validator::make($request->all(),[
            'id'=>'required',

        ]);
        if($validator->fails())
        {
            // echo $validator->errors();
            // die;
            return response()->json($validator->errors(),400);
        }
        
        else{
            
	    $id = $request->id;
        $data=subcategory::orderBy('id','asc')
        ->select(['id','category_id','name'])
        ->where('category_id',$id)
        ->get();
        return response()->json([
            'data'=>$data      
        ]);
        }
    }


  public function services(Request $request){
	  $id = $request->id;
        $data=subcategory::orderBy('id','asc')
        ->select(['id','category_id','name'])
        ->where('category_id',$id)
        ->get();
        return response()->json([
            'data'=>$data      
        ]); 
    }

  
}
