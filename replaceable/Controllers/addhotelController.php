<?php

namespace App\Http\Controllers;
use App\Models\addhotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\area;
use App\Models\city;
use App\Models\roomtype;
use App\Models\HotelType;

class addhotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data= DB::table('add_hotel')
            ->join('area', 'area.id', '=', 'add_hotel.area_id')
            ->join('city', 'city.id', '=', 'add_hotel.city_id')
            ->join('hotel_type', 'hotel_type.id', '=', 'add_hotel.hotel_type_id')
            ->select('add_hotel.*','add_hotel.id as hotelid','area.*','area.id as areaid','area.name as areaname','city.*','city.id as cityid','city.name as cityname','hotel_type.type as hoteltype')
            ->paginate(5); 

        return view('hotels.manage-hotel',['hotelsdata'=>$data]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $hoteltypedata=DB::table('hotel_type')->get();
        $areadata=DB::table('area')->get();
        $citydata=DB::table('city')->get();
        $roomdata11=DB::table('roomtype')->get();
        $facility=DB::table('facilities')->get();
        return view('hotels.add-hotel',['areadata'=>$areadata,'citydata'=>$citydata,'roomdata11'=>$roomdata11 ,'hoteltypedata'=>$hoteltypedata,'facility'=>$facility]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotel_name'=>'required',
            'facilities'=>'required',
            'description'=>'required',
            'price'=>'required',
            'location'=>'required',
            'city_id'=>'required',
            'area_id'=>'required',
            'hotel_type_id'=>'required',
            'roomtype_id'=>'required'
        ]);
        $data=$request->all();
        $data['facilities'] = implode(",", $request->get('facilities'));
        $data['price'] = implode(",", $request->get('price'));
        $data['roomtype_id'] = implode(",", $request->get('roomtype_id'));
        addhotel::create($data);
       
        return redirect()->route('hotel.index')->with('success','Hotel added successfully');

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
        $iddata=addhotel::find($id);

        $city = DB::table('city')->get();
        $area = DB::table('area')->get();
        $tablefacilities = DB::table('facilities')->get();
        $hoteltypes = DB::table('hotel_type')->get();
        $roomtypes = DB::table('roomtype')->get();
        return view('hotels.edit-hotel',['data'=>$iddata,'hoteltypes'=>$hoteltypes,'city'=>$city,'area'=>$area,'tablefacilities'=>$tablefacilities,'roomtypes'=>$roomtypes]);
       



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
        $request->validate([
            'hotel_name'=>'required',
            'facilities'=>'required',
            'description'=>'required',
            'price'=>'required',
            'city_id'=>'required',
            'area_id'=>'required',
            'roomtype_id'=>'required',
            'hotel_type_id'=>'required',
            'location'=>'required'
        ]);
        $updatefacilities = implode(",", $request->get('facilities'));
        $updateprice = implode(",", $request->get('price'));
        $updateroomtype = implode(",", $request->get('roomtype_id'));

        $updatehotel=addhotel::find($id);

        $updatehotel->hotel_type_id=$request->hotel_type_id;
        $updatehotel->hotel_name=$request->hotel_name;
        $updatehotel->description=$request->description;
        $updatehotel->city_id=$request->city_id;
        $updatehotel->area_id=$request->area_id;
        $updatehotel->facilities= $updatefacilities ;
        $updatehotel->price= $updateprice ;
        $updatehotel->roomtype_id= $updateroomtype ;
        $updatehotel->location=$request->location;

        $updatehotel->save();
        return redirect()->route('hotel.index')->with('success','Hotel Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(addhotel $addhotel, $id)
    {
         $dlthotel=addhotel::find($id);
        $dlthotel->delete();
        return redirect()->route('hotel.index')->with('success','Hotel deleted successfully');
    }


}
