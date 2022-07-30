<?php

namespace App\Http\Controllers\api;
use App\Models\area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AreaApiController extends Controller
{
    public function index(){
        // $data['data']=area::orderBy('id','desc')->paginate(5);
        $data=DB::table('area')->join('city','city.id','=','area.city_id')
		->select('city.name as cityname','area.id as area_id','area.name as areaname')->get();
		
		
        return response()->json([
            "data"=>$data
        ]);
    }

    public function StoreArea(Request $Request){
        $Request->validate([
            'name'=>'required',
            'city_id'=>'required'
        ]);

        $datastore=$Request->all();
        area::create($datastore);

        return response()->json([
            'msg'=>'area added successfully',
            'data'=>$datastore

        ]);
    }
}
