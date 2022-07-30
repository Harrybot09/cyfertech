<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat['categories']=category::orderBy('id','desc')->whereNull('parent_category_id')->paginate(10);
        return view('category.manage-category',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add-category');
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
            'name' => 'required',
           // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        $input = $request->all();
		
        if ($image = $request->file('image')) {
                    $profileImage = time().'.'.$request->image->extension();
                    $request->image->move(public_path('uploads'), $profileImage);
                    $input['image'] = "$profileImage";
                }
    
       category::create($input);
        return redirect()->route('category.index')
                        ->with('success','category has been created successfully.');
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
    public function edit(category $category)
    {
        
        return view('category.edit-category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request ,$id){
       
        $edit=category::find($id);
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

        return redirect()->route('category.index')
                 ->with('success','category updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlt=category::find($id);
        $dlt->delete();
        return redirect()->route('category.index')
                 ->with('success','category deleted successfully');
        
    }
}
