<?php

namespace App\Http\Controllers;
use App\Models\servicecategory;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\services;

class servicecatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $cat['services'] = DB::table('service_category')
        ->join('services', 'services.id', '=', 'service_category.service_id')
        ->select('service_category.id as mainid','service_category.name as subcatname', 'services.*','services.name as catname')
        ->paginate(10);  
       
        return view('servicecategory.manage-service-cat',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$category = DB::table('categories')->whereNull('parent_category_id')->get();
		$services = DB::table('services')->get();
		$subcategory = DB::table('subcategory')->get();
        return view('servicecategory.add-service-cat',['services' => $services,'category' => $category,'subcategory' => $subcategory]);
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
            'service_id' => 'required',
            'name' => 'required',
            ]);
        $input = $request->all();

    
       servicecategory::create($input);
        return redirect()->route('servicecategory.index')
                        ->with('success','Service category has been created successfully.');
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
    public function edit(servicecategory $servicecategory)
    {
		// $edit=servicecategory::find($id);
        $cat = DB::table('services')->get();
        return view('servicecategory.edit-service-cat',compact('servicecategory'),['cate' => $cat]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request ,$id){
       
        $edit=servicecategory::find($id);
        $edit->service_id = $request->input('service_id');
        $edit->name = $request->input('name');
     

        $edit->update();

        return redirect()->route('servicecategory.index')
                 ->with('success','Service category updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlt=servicecategory::find($id);
        $dlt->delete();
        return redirect()->route('servicecategory.index')
                 ->with('success','Service category updated successfully');
        
    }
}
