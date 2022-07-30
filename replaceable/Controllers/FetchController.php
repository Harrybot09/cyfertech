<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\area;
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
    

   
}
