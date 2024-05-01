<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\InvestmentController;

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
Route::group(['middleware' => ['web', 'activity']], function () {
  Route::get('/', [HomeController::class,'index'])->name('home');

  Route::get('/detail/{furl}', [HomeController::class,'detail'])->name('detail');
  Route::get('/listing/{propertyStatus?}', [HomeController::class,'listing'])->name('search');
  
});
Route::get('/big-photo/{id}', [HomeController::class,'big_photo']);
Route::get('/find', [HomeController::class,'search_filter']);
Route::get('/about', [HomeController::class,'about']);
Route::get('/services', [HomeController::class,'services']);
Route::get('/investments', [HomeController::class,'investments']);
Route::get('/contact', [HomeController::class,'contact']);
Route::post('/contact', [HomeController::class,'send_mail'])->name('contact');
Route::post('/send_property_message', [HomeController::class,'send_property_message'])->name('send_property_message');

Route::post('/upload',[ImageController::class,'upload']);
Route::post('/upload-logo',[AdminController::class,'upload']);
Route::post('img-del',[ImageController::class,'delete']);
Route::post('img-edit',[ImageController::class,'edit']);
Route::post('img-update',[ImageController::class,'update_photo_crop']);
Route::post('file-upload',[ImageController::class,'files_upload']);
Route::post('file-delete',[ImageController::class,'file_delete']);
Route::get('/user', function () {
  return redirect('/');
});
Route::middleware(['auth'])->prefix('user')->group(function () {
    
    Route::get('/saved-properties', [HomeController::class,'saved_properties'])->name('saved');
    Route::get('/my-reviews', [HomeController::class,'my_review'])->name('my-reviews');
    Route::get('/my-messages', [HomeController::class,'my_messages'])->name('my-messages');
    Route::get('/my-messages/{id}', [HomeController::class,'my_message_show']);
    Route::post('/my-messages/{id}', [HomeController::class,'send_my_message']);
    
    Route::post('/give-rate',  [HomeController::class,'give_rate'])->name('give-rate');
    Route::post('/saved',  [HomeController::class,'saved'])->name('saved');
});
    
Route::middleware(['auth', 'isAdmin'])->prefix('dashboard')->group(function () {
  Route::get('/', [AdminController::class,'index'])->name('dashboard');
  Route::get('/helps', [AdminController::class,'helps'])->name('help');
  Route::get('/helps/{data}', [AdminController::class,'help_video']);
  Route::get('/store_details', [AdminController::class,'store_details'])->name('store');
  Route::post('/store_details', [AdminController::class,'update_store_details'])->name('store_details');
  
  Route::resource('/properties', PropertyController::class);
  Route::post('/properties/map', [PropertyController::class, 'map']);

  Route::get('/properties/add/{property_status}',  [PropertyController::class,'create'])->name('properties.add','{property_status}');
  Route::post('/properties/confirm/{id}', [PropertyController::class,'change_status'])->name('property-confirm');
  Route::get('/customers/users', [CustomerController::class, 'users']);
  
  Route::resource('/roles', RoleController::class);
  Route::resource('/users', UserController::class);
  Route::resource('/permissions', PermissionController::class);
  Route::resource('/customers', CustomerController::class);
  Route::resource('/reviews', ReviewController::class);
  Route::resource('/investments', InvestmentController::class);
  Route::resource('/messages', MessageController::class);
  
  Route::post('/customers/quick-add-customer', [CustomerController::class, 'quick_add_customer']);
  Route::post('/customers/store-quick-add-customer', [CustomerController::class, 'store_quick_add_customer']);

  
  Route::get('/my-profile', [AdminController::class, 'user_profile'])->name('profile');
  Route::post('/my-profile', [AdminController::class, 'update_user_profile'])->name('my-profile');
  
  Route::get('/change-password', [AdminController::class, 'change_password'])->name('change-password');
  Route::post('/change-password', [AdminController::class, 'update_password'])->name('update-password');

  Route::get('/users/reset-password/{id}', [UserController::class, 'reset'])->name('users.password.reset');
});



require __DIR__.'/auth.php';
