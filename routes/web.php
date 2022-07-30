<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cityController;
use App\Http\Controllers\areaController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\subcategoryController;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\facilityController;
use App\Http\Controllers\roomtypeController;
use App\Http\Controllers\addhotelController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HotelBookingController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\AdventureController;
use App\Http\Controllers\AdventureSportsController;
use App\Http\Controllers\AdventureSlidesController;
use App\Http\Controllers\AdventureBookingsController;
use App\Http\Controllers\servicecatController;
use App\Http\Controllers\servicesubcatController;
use App\Http\Controllers\RatesperuserController;


// VENDOR SECTION // 
use App\Http\Controllers\VendorControllers\HotelController;
use App\Http\Controllers\VendorControllers\HotelSlidesController;
use App\Http\Controllers\VendorControllers\VendorsAdventureSportsController;
use App\Http\Controllers\VendorControllers\VendorsAdventureSportSlideController;
use App\Http\Controllers\VendorControllers\HotelBookingsController;
use App\Http\Controllers\VendorControllers\VendorAdventureBookingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('auth.login');
});


Route::get('/vendor-admin', function () {
    return view('vendors-dashboard/vendor-login');
})->name('vendor-admin');

Route::get('/vendor-dashboard', function () {
    return view('vendors-dashboard/vendor-index');
})->name('vendordashboard');


// VENDORS ROUTES //
Route::resource('/vendor',VendorsController::class); 

Route::get('/addhotel',[HotelController::class,'create'])->name('addhotel');
Route::post('/storehotel',[HotelController::class,'store'])->name('storehotel');
Route::get('/viewhotel',[HotelController::class,'index'])->name('viewhotel');
Route::get('/hoteledit/{id}',[HotelController::class,'edit'])->name('hoteledit');
Route::put('/hoteleupdate/{id}',[HotelController::class,'update'])->name('hoteleupdate');
Route::delete('/hoteldestroy/{id}',[HotelController::class,'destroy'])->name('hoteldestroy');
Route::get('/loggin',[HotelController::class,'LoginVendor'])->name('loggin');
Route::get('/loggout',[HotelController::class,'loggout'])->name('loggout');
Route::get('/logout',[HotelController::class,'logout'])->name('logout');

Route::resource('/slides',HotelSlidesController::class);

Route::resource('/sportsadventure',VendorsAdventureSportsController::class);
Route::resource('/slideadventure',VendorsAdventureSportSlideController::class);

Route::get('/hbookings',[HotelBookingsController::class,'VendorHotelBookings'])->name('hbookings');
Route::get('/moredetails{id}',[HotelBookingsController::class,'MoreHBookingDetails'])->name('moredetails');

Route::get('/vendoradventurebookings',[VendorAdventureBookingsController::class,'VendorsAdventureBookings'])->name('vendoradventurebookings');



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    Route::resource('/city',cityController::class);
    Route::resource('/area',areaController::class);
    Route::resource('/category',categoryController::class);
    Route::resource('/subcategory',subcategoryController::class);
	Route::resource('/services',servicesController::class);

	Route::resource('/servicecategory',servicecatController::class);
	Route::resource('/ratesperuser',RatesperuserController::class);
	Route::resource('/servicesubcategory',servicesubcatController::class);
    Route::resource('/facility',facilityController::class);
    Route::resource('/room',roomtypeController::class);
    Route::resource('/hotel',addhotelController::class);
    Route::resource('/hoteltype',HotelTypeController::class);
    Route::get('/myform/ajax/{id}',[FetchController::class,'myformAjax'])->name('myformajax');
    Route::resource('/slide',SlidesController::class);
    Route::resource('/images',ImagesController::class);
    Route::get('/showusers',[ManageUserController::class,'showuser'])->name('showusers');
    Route::get('/subscriptions/{id}',[ManageUserController::class,'subscriptions'])->name('subscriptions');
    Route::delete('/deleteuser/{id}',[ManageUserController::class,'DeleteUser'])->name('Destroy');
    Route::resource('/booking',HotelBookingController::class);
    Route::resource('/adventure',AdventureController::class);
    Route::resource('/adventuresport',AdventureSportsController::class);
    Route::resource('/adventureslide',AdventureSlidesController::class);
    Route::get('/adventurebookings',[AdventureBookingsController::class,'AdventureBookings']);
    Route::get('/getcategory/{id}',[FetchController::class,'getcategory'])->name('getcategory');
    Route::post('/getsubcategory',[FetchController::class,'getsubcategory'])->name('getsubcategory');
    Route::post('/servicesubcat',[FetchController::class,'servicesubcat'])->name('servicesubcat');
	Route::get('/serviceproduct',[FetchController::class,'serviceproduct'])->name('serviceproduct');
	Route::get('/features',[FetchController::class,'features'])->name('features');
	Route::post('/savefeatures',[FetchController::class,'savefeatures'])->name('savefeatures');
	Route::post('saveserviceproduct',[FetchController::class,'saveserviceproduct'])->name('saveserviceproduct');
	
	
    Route::get('/getservice/{cat}',[FetchController::class,'getservice'])->name('getservice');

});
