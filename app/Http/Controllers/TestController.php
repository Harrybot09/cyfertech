<?php

namespace App\Http\Controllers;
use App\Models\addhotel;
use App\Models\area;
use App\Models\city;
use App\Models\facilities;
use App\Models\HotelType;
use App\Models\roomtype;
use App\Models\TestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function StoreImage(Request $request)
    {
       
         $input = $request->all();

        if ($image = $request->file('image')) {
                    $profileImage = time().'.'.$request->image->extension();
                    $request->image->move(public_path('storage'), $profileImage);
                    $input['image'] = "$profileImage";
                }
    
       TestModel::create($input);
    }
}
