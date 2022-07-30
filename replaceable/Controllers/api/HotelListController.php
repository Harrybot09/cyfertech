<?php

namespace App\Http\Controllers\api;
use App\Models\addhotel;
use App\Models\area;
use App\Models\city;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HotelListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //  $hotellist = addhotel::find($id);
        // $hotellist['hotellist'] = DB::table('add_hotel')
        // ->join('slides','add_hotel.id','=','slides.hotel_id')
        // ->select('slides.image')->get();
        //  $hotellist['hotellist'] = DB::table('add_hotel')
        //  ->join('area','area.id','=','add_hotel.area_id')
        //  ->join('city','city.id','=','add_hotel.city_id')
        //  ->join('roomtype','roomtype.id','=','add_hotel.roomtype_id')
        //  ->join('slides','add_hotel.id','=','slides.hotel_id')
        //  ->select('add_hotel.hotel_name','add_hotel.description','add_hotel.facilities','roomtype.type as roomtype','city.name as cityname','area.name as areaname','slides.image')
        //  ->get();
        //  if (is_null($hotellist)) {
        //  return $this->sendError('Hotels not found.');
        //  }
        //  return response()->json([
        //  "success" => true,
        //  "message" => "Hotels retrieved successfully.",
        //  "data" => $hotellist
        //  ]);


        $hotellist =DB::table('add_hotel')->get();
           

        if (is_null($hotellist)) {
             return $this->sendError('Hotels not found.');
             }
             return response()->json([
             "success" => true,
             "message" => "Hotels retrieved successfully.",
             "data" => $hotellist
             ]);     
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
