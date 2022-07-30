<?php

namespace App\Http\Controllers;
use App\Models\HotelType;
use Illuminate\Http\Request;

class HotelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch['fetch']=HotelType::orderBy('id','desc')->paginate(5);
        return view('hotel_type.manage-hotel-type',$fetch);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel_type.add-hotel-type');
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
            'type'=>'required'
        ]);
        $data =$request->all();
        HotelType::create($data);
        return redirect()->route('hoteltype.index')->with('success','Hotel Type has been created');
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
        $data['getdata']=HotelType::find($id);
        return view('hotel_type.edit-hotel-type',$data);
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
            'type'=>'required'
        ]);
        $hotel=HotelType::find($id);
        $hotel->type=$request->type;
        $hotel->save();
        return redirect()->route('hoteltype.index')->with('success','Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $HotelType=HotelType::find($id);
        $HotelType->delete();
        return redirect()->route('hoteltype.index')->with('success','Deleted successfully');
    }
}
