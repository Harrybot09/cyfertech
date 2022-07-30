<?php

namespace App\Http\Controllers\api;
use App\Models\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesApiController extends Controller
{
    public function index(){

 
        $data=category::orderBy('id','desc')->select('name','description','image')->get();

        // $chkurl=[];

                foreach($data as $imgar):
                    $chkurl[]=env('APP_URL').$imgar->image;
                endforeach ;

                for ($i=0; $i < count($data) ; $i++) { 
                    $data[$i]->image= $chkurl[$i];
                 }

        return response()->json([
            'msg'=>'successfull',
            'data'=>$data
        ]);
    }
}
