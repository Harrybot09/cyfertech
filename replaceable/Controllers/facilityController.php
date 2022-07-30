<?php

namespace App\Http\Controllers;
use App\Models\facilities;
use Illuminate\Http\Request;

class facilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['facility']=facilities::orderBy('id','desc')->paginate(5);
        return view('facility.manage-facility',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facility.add-facility');
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
            'fac_name' => 'required',
            'icon' => 'required'
        ]);
        $input = $request->all();

        if ($image = $request->file('icon')) {
                    // $destinationPath = 'uploads/';
                    $profileImage = time().'.'.$request->icon->extension();
                    $request->icon->move(public_path('uploads'), $profileImage);
                    // $image->move($destinationPath, $profileImage);
                    $input['icon'] = "$profileImage";
                }
    
                facilities::create($input);
        return redirect()->route('facility.index')
                        ->with('success','facility has been created successfully.');
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
        $facilities=facilities::find($id);
        return view('facility.edit-facility',compact('facilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id){
       
        $editfac=facilities::find($id);
        $editfac->fac_name = $request->input('fac_name');
     
        if ($icon = $request->file('icon')) {
            // $destinationPath = 'uploads/';
            $profileImage = time().'.'.$request->icon->extension();
            $request->icon->move(public_path('uploads'), $profileImage);
            // $image->move($destinationPath, $profileImage);
            $editfac['icon'] = "$profileImage";
        }
        else{
            unset($editfac['icon']);
        }

        $editfac->update();

        return redirect()->route('facility.index')
                 ->with('success','facility updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dltfac=facilities::find($id);
        $dltfac->delete();
        return redirect()->route('facility.index')
                        ->with('success','Deleted successfully.');
    }
}
