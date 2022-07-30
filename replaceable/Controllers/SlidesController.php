<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\slide;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide=DB::table('slides')->get();
        $combinedata=DB::table('slides')
        ->join('add_hotel','add_hotel.id','=','slides.hotel_id')
        ->select('slides.*','add_hotel.hotel_name as hotelname','add_hotel.id as hotelid','slides.image as slideimage','slides.hotel_id as slidehotelid')
        ->paginate(5); 


    
       
        return view('slides.manage-slide',['slides'=>$slide,'combinedata'=>$combinedata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels=DB::table('add_hotel')->get();
        return view('slides.add-slide',['hotels'=>$hotels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $check=new slide();
        // print_r($check);

        $this->validate($request,[
            'hotel_id'=>'required',
            'image'=>'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $files=[];
        // if($files=$request->image)
        // {
        //     foreach($files as $file)
        //     {
        //         $imgrandomname=time();
        //         //  $name=$file->getClientOriginalName();
        //          $name=$file->getClientOriginalName();
        //         $imagefullname=$imgrandomname.'.'.$name;
        //         $uploadpath='slideimages/';
        //         $image_url=$uploadpath.$imagefullname;
        //         $file->move($uploadpath,$imagefullname);
        //         $files[]=$image_url;

              
        //     }
        // }

        if($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                $name = $file->getClientOriginalName();
                $uploadpath='slideimages/';
                $imageurl=$uploadpath.$name;
                // $files[] = $imageurl;
                if($file->move(public_path('slideimages'), $name)){

                    $insert=new slide();
                    $insert->image=json_encode($imageurl);
                    $insert->hotel_id=$request->hotel_id;
                    $insert->save();
                    
                }
            }
    
    return redirect()->route('slide.index')->with('success','Slide added successfully');
      
  

    }
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
        $editslide=slide::find($id);
        $hotels=DB::table('add_hotel')->get();
        return view('slides.edit-slide',['editslide'=>$editslide,'hotels'=>$hotels]);

       

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
        $edit=slide::find($id);
        $edit->hotel_id = $request->input('hotel_id');

        if($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                $name = $file->getClientOriginalName();
                $uploadpath='slideimages/';
                $imageurl=$uploadpath.$name;
                // $files[] = $imageurl;
                $file->move(public_path('slideimages'), $name);
                $edit->image=json_encode($imageurl);
            }
        }
        else{
            unset($edit['image']);
        }

        $edit->update();

        return redirect()->route('slide.index')
                 ->with('success','Slide updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(slide $slide)
    {
        // $dltslide=slide::find($id);
        $slide->delete();

        return redirect()->route('slide.index')->with('success','Slide deleted successfully');
    }
}
