<?php

namespace App\Http\Controllers\api;
use App\Models\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesApiController extends Controller
{
    public function index(){
        $data=category::orderBy('id','desc')->select('name','description','image')->paginate(5);
        return response()->json([
            'msg'=>'successfull',
            'data'=>$data
        ]);
    }
}
