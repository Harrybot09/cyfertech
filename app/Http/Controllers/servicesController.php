<?php

namespace App\Http\Controllers;
use App\Models\subcategory;
use App\Models\category;
use App\Models\services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class servicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 
       
	   $cat['services']  = category::categorytree();
	   
        return view('services.manage-services',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		 $cat['services']  = category::categorytree();
		$category = DB::table('categories')->whereNull('parent_category_id')->get();
		//$subcategory = DB::table('subcategory')->get();
        return view('services.add-services',['category' => $category],$cat);
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
           // 'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
/*             'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required', */
        ]);
        $input = $request->all();
//dd($input);
$name = $request->name;
$category_id = $request->category_id;
$sub_category_id= $request->sub_category_id;

foreach($name as $key => $no)
{
    $input['name'] = $no;
    $input['parent_category_id'] = $sub_category_id;

    category::create($input);

}

/*         if ($image = $request->file('image')) {
                    $profileImage = time().'.'.$request->image->extension();
                    $request->image->move(public_path('uploads'), $profileImage);
                    $input['image'] = "$profileImage";
                }
     */
 
        return redirect()->route('services.index')
                        ->with('success','Services has been created successfully.');
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
