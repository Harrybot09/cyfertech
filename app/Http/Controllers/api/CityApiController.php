<?php

namespace App\Http\Controllers\api;
use App\Models\city;
use App\Models\state;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class CityApiController extends Controller
{
    public function index(){
        $data['data']=city::orderBy('id','desc')
        ->select(['name'])
        ->paginate(5);
        return response()->json([
            'data'=>$data
        ]);
    }

    public function StoreCity(Request $Request){
        $Request->validate([
            'name'=>'required'
        ]);

        $datastore=$Request->all();
        city::create($datastore);

        return response()->json([
            'msg'=>'city added successfully',
            'data'=>$datastore
        ]);
    }
	
public function selectstate(){
	 $data=state::orderBy('ID','desc')
        ->select(['ID','state_id','state_name'])
        ->get();
        return response()->json([
            'data'=>$data
        ]);
	
}

public function selectcity(Request $request){
    
    	$validator=Validator::make($request->all(),[
                'state_id'=>'required',
            ]);

        if($validator->fails())
        {
            // echo $validator->errors();
            // die;
            return response()->json($validator->errors(),400);
        }
        else
        { 
            
	$id = $request->state_id;
	 $data=city::orderBy('ID','desc')
        ->select(['ID','state_id','city'])
		->where('state_id',$id)
        ->get();
        return response()->json([
            'data'=>$data
        ]);
        }
}
	
}
