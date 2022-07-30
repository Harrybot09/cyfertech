<?php

namespace App\Http\Controllers;
use App\Models\servicecategory;
use App\Models\services_subcategory;
use App\Models\services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class servicesubcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $cat['services'] = DB::table('services_subcategory')
        ->join('services', 'services.id', '=', 'services_subcategory.service_id')
		->join('service_category', 'service_category.id', '=', 'services_subcategory.sub_service_id')
        ->select('services_subcategory.name as service_name','services_subcategory.id as mainid','service_category.name as subcatname','services.name as catname')
        ->paginate(10);  
       
        return view('servicesubcat.manage-servicesubcat',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$services = DB::table('services')->get();
		$service_category = DB::table('service_category')->get();
        return view('servicesubcat.add-servicesubcat',['services' => $services,'service_category' => $service_category]);
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
            'sub_service_id' => 'required',
            'name' => 'required',
/*          'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required', */
        ]);
        $input = $request->all();
//dd($input);
$name = $request->name;
$category_id = $request->service_id;
$sub_category_id= $request->sub_service_id;

foreach($name as $key => $no)
{
    $input['name'] = $no;
    $input['service_id '] = $category_id;
    $input['sub_service_id'] = $sub_category_id;

    services_subcategory::create($input);

}

/*         if ($image = $request->file('image')) {
                    $profileImage = time().'.'.$request->image->extension();
                    $request->image->move(public_path('uploads'), $profileImage);
                    $input['image'] = "$profileImage";
                }
     */
 
        return redirect()->route('servicesubcategory.index')
                        ->with('success','Services Sub category has been created successfully.');
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
		$services=services::find($id);
		$cat = DB::table('category')->get();
		$subcat=subcategory::find($services->sub_category_id);
		
        //$subcat = DB::table('subcategory')->get();
        return view('services.edit-services',compact('services'),['cate' => $cat,'subcat'=>$subcat]); 	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request ,$id){
       
        $edit=services::find($id);
        $edit->category_id = $request->input('category_id');
        $edit->sub_category_id = $request->input('sub_category_id');
        $edit->name = $request->input('name');
     /*    $edit->description = $request->input('description');
     
     

        if ($image = $request->file('image')) {
            // $destinationPath = 'uploads/';
            $profileImage = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $profileImage);
            // $image->move($destinationPath, $profileImage);
            $edit['image'] = "$profileImage";
        }
        else{
            unset($edit['image']);
        }
 */
        $edit->update();

        return redirect()->route('services.index')
                 ->with('success','Services updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlt=services::find($id);
        $dlt->delete();
        return redirect()->route('services.index')
                 ->with('success','Services updated successfully');
        
    }
}
