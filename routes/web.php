<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/test', function () {
    return view('testing');
});


Route::get('/staff', function () {
    return view('staff');
});



//Topping


Route::get('/addTopping', function () {
    return view('addTopping');
});

Route::post('/addTopping',[App\Http\Controllers\ToppingController::class, 'add'])->name('addTopping');

Route::get('/viewTopping',[App\Http\Controllers\ToppingController::class, 'view'])->name('viewTopping');



//NoodleType
Route::get('/addNoodleType', function () {
    return view('addNoodleType');
});

Route::post('/addNoodleType',[App\Http\Controllers\NoodleTypeController::class, 'add'])->name('addNoodleType');

Route::get('/viewNoodleType',[App\Http\Controllers\NoodleTypeController::class, 'view'])->name('viewNoodleType');


//Food
Route::get('/newItem', function () {
    return view('addFood',['ToppingID'=> App\Models\Topping::all(),'NoodleTypeID'=> App\Models\NoodleType::all()]);
});
Route::post('/newItem',[App\Http\Controllers\FoodController::class, 'add'])->name('newItem');





//Cart
Route::get('/testCart',[App\Http\Controllers\CartController::class, 'getCart'])->name('testCart');

Route::get('/viewCart',[App\Http\Controllers\CartController::class, 'viewCart'])->name('viewCart');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
