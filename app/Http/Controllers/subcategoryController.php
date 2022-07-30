<?php

namespace App\Http\Controllers;
use App\Models\subcategory;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class subcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $cat['categories'] = DB::table('categories')
		  ->whereNull('parent_category_id')
        ->paginate(10);  
       
        return view('subcategory.manage-subcategory',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$category = DB::table('categories')->whereNull('parent_category_id')->get();
        return view('subcategory.add-subcategory',['category' => $category]);
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
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        $input = $request->all();
		$input['name'] = $request->name;
		$input['parent_category_id'] = $request->category_id;
		$input['description'] = $request->description;

        if ($image = $request->file('image')) {
                    $profileImage = time().'.'.$request->image->extension();
                    $request->image->move(public_path('uploads'), $profileImage);
                    $input['image'] = "$profileImage";
                }
    
       category::create($input);
        return redirect()->route('subcategory.index')
                        ->with('success','Sub category has been created successfully.');
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
    public function edit(subcategory $subcategory)
    {
        $cat = DB::table('category')->get();
        return view('subcategory.edit-subcategory',compact('subcategory'),['cate' => $cat]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request ,$id){
       
        $edit=subcategory::find($id);
        $edit->category_id = $request->input('category_id');
        $edit->name = $request->input('name');
        $edit->description = $request->input('description');
     
     

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

        $edit->update();

        return redirect()->route('subcategory.index')
                 ->with('success','Sub category updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlt=subcategory::find($id);
        $dlt->delete();
        return redirect()->route('subcategory.index')
                 ->with('success','Sub category updated successfully');
        
    }
}
