<?php

namespace App\Http\Controllers;
use App\Models\roomtype;
use Illuminate\Http\Request;

class roomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rooms'] = roomtype::orderBy('id','asc')->paginate(5);
        return view('room.manage-room', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.add-room');
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
        roomtype::create($data);
        return redirect()->route('room.index')->with('success','room has been created');
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
            $room=roomtype::find($id);
            return view('room.edit-room',compact('room'));
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
        $room=roomtype::find($id);
        $room->type=$request->type;
        $room->save();
        return redirect()->route('room.index')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dltroom=roomtype::find($id);
        $dltroom->delete();
        return redirect()->route('room.index')->with('success','Deleted successfully');

    }
}
