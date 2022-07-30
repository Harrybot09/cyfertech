<?php

namespace App\Http\Controllers;
use App\Models\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['areas']=area::orderBy('id','asc')->paginate(5);
        // return view('area.manage-area',$data);


        $data['areas'] = DB::table('area')
        ->join('city', 'city.id', '=', 'area.city_id')
        ->select('area.id as mainid','area.name as areaname', 'city.*','city.name as cityname')
        ->paginate(5); 
        return view('area.manage-area',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = DB::table('city')->get();
        return view('area.add-area',['city' => $city]);
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
            'city_id'=>'required',
            'name'=>'required'
        ]);

        $data=$request->all();
        area::create($data);
        return redirect()->route('area.index')->with('success','Area has been created');

    
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
    public function edit(area $area)
    {
        $city = DB::table('city')->get();
        return view('area.edit-area',compact('area'),['city' => $city]);

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
            'name'=>'required',
            'city_id'=>'required'
        ]);
        $area=area::find($id);
        $area->name=$request->name;
        $area->city_id=$request->city_id;
        $area->save();
        return redirect()->route('area.index')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area=area::find($id);
        $area->delete();
        return redirect()->route('area.index')->with('success','Area deleted successfully');

    }
}
