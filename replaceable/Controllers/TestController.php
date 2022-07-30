<?php

namespace App\Http\Controllers;
use App\Models\addhotel;
use App\Models\area;
use App\Models\city;
use App\Models\facilities;
use App\Models\HotelType;
use App\Models\roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        $hotellist =DB::table('add_hotel')->get();
        
        dd($hotellist);
        

    }
}
