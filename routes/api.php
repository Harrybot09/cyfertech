<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\HotelListsController;
use App\Http\Controllers\api\TestApiController;
use App\Http\Controllers\api\UserRegisterController;
use App\Http\Controllers\api\CityApiController;
use App\Http\Controllers\api\CategoryApiController;
use App\Http\Controllers\api\CartApiController;
use App\Http\Controllers\api\AreaApiController;
use App\Http\Controllers\api\ServicesApiController;
use App\Http\Controllers\api\CategoriesApiController;
use App\Http\Controllers\api\UserSearchController;
use App\Http\Controllers\api\HotelSearchController;
use App\Http\Controllers\api\AdventureApiController; 
use App\Http\Controllers\api\HotelBookApiController;
use App\Http\Controllers\api\AdventureBookController;
use App\Http\Controllers\api\NotificationController;
use App\Http\Controllers\api\UserSupportController;
use App\Http\Controllers\RazorPayController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RatesperuserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
   
});
Route::group(['middleware'=>'auth:sanctum'],function(){ 
    
    
});


Route::post('/hotellist',[HotelListsController::class,'index']);
Route::post('/favourites',[HotelListsController::class,'AddFavourite']);
Route::post('/favlist',[HotelListsController::class,'FavouritesList']);
Route::post('/checkfav',[HotelListsController::class,'CheckFav']);
Route::post('/unfavourite',[HotelListsController::class,'RemoveFavourite']);
Route::post('/unfavouriteall',[HotelListsController::class,'RemoveAllFavourite']);
Route::post('/getlist',[HotelListsController::class,'getlist']);

Route::get('/userlogout',[UserRegisterController::class,'logout'])->name('userlogout');
Route::get('/register',[UserRegisterController::class,'register']);
Route::put('/verify',[UserRegisterController::class,'verifyOtp']);
Route::get('/verify2',[UserRegisterController::class,'verifyOtp2']);
Route::get('/login',[UserRegisterController::class,'LoginUser']);
Route::post('/resendotp',[UserRegisterController::class,'resendOtp']);
Route::get('/getuser',[UserRegisterController::class,'GetUserData']);
Route::post('/forgotpassword',[UserRegisterController::class,'ForgotPassword'])->name('forgotpassword');
Route::post('/forgotpassword2',[UserRegisterController::class,'ForgotPassword2'])->name('forgotpassword2');
Route::get('/resetpasswordform/{token}',[UserRegisterController::class,'showResetPasswordForm'])->name('resetpasswordform');
Route::post('/resetpassword',[UserRegisterController::class,'ResetPassword'])->name('resetpassword');
Route::post('/resetpassword2',[UserRegisterController::class,'ResetPassword2'])->name('resetpassword2');
Route::post('/profile',[UserRegisterController::class,'AddProfile']);

Route::get('/categories',[CategoryApiController::class,'index']);
Route::post('/subcategories',[CategoryApiController::class,'subcat'])->name('subcategories');
Route::post('/ratesperuser',[RatesperuserController::class,'ratesperuser'])->name('ratesperuser');

Route::post('/addcity',[CityApiController::class,'StoreCity']);

Route::get('/showarea',[AreaApiController::class,'index']);
Route::post('/addarea',[AreaApiController::class,'StoreArea']); 

Route::get('/showcategory',[CategoriesApiController::class,'index']);
Route::get('productlist',[ServicesApiController::class,'products']);
Route::get('/noofusers',[ServicesApiController::class,'productrate']);
Route::post('/addtocart',[ServicesApiController::class,'cartadd']);
Route::get('/cartlist',[ServicesApiController::class,'cartlist']);
Route::post('/savedetails',[ServicesApiController::class,'saveuserdetails']); 
Route::post('/productdata',[ServicesApiController::class,'productdata']); 
Route::get('/allproduct',[ServicesApiController::class,'allproduct']);  
Route::post('/filter',[ServicesApiController::class,'filterapi']); 

Route::get('/stateslist',[CityApiController::class,'selectstate']);

Route::get('/citieslist',[CityApiController::class,'selectcity']);
Route::post('/hotelsearch',[HotelSearchController::class,'HotelSearch']);

Route::get('/search/{query}',[UserSearchController::class,'UserSearch']);

Route::post('/adventurelist',[AdventureApiController::class,'index']);
Route::post('/adventuresport',[AdventureApiController::class,'AdventureSports']);

route::post('/book',[HotelBookApiController::class,'HotelBooking']);
route::post('/bookinglist',[HotelBookApiController::class,'MyBookingList']);
route::post('/bookinghistory',[HotelBookApiController::class,'BookingHistory']);
route::post('/pay',[HotelBookApiController::class,'Payments']);

Route::post('/bookadventure',[AdventureBookController::class,'AdventureBook']);
Route::post('/adventurebookinglist',[AdventureBookController::class,'MyAdventureBookingList']);
Route::post('/adventurebookinghistory',[AdventureBookController::class,'AdventureBookingHistory']);


Route::post('/notify',[NotificationController::class,'index']);

Route::post('/razorpay',[RazorPayController::class,'payment']);

Route::post('/support',[UserSupportController::class,'UserSupport']);

Route::post('storeimg',[TestController::class,'StoreImage']);

