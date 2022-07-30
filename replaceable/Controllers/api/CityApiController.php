<?php

namespace App\Http\Controllers\api;
use App\Models\city;
use App\Http\Controllers\Controller;
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
}
