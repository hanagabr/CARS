<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\addTestmony;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\contactController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('cars', [CarsController::class,'car'])->name('cars');
Route::get('listing', [CarsController::class,'index'])->name('listing');
Route::get('testimonials', [CarsController::class,'testemony'])->name('testimonials');
Route::get('blog', [CarsController::class,'blog'])->name('blog');
Route::get('about', [CarsController::class,'aboutUs'])->name('about');
Route::get('contact', [contactController::class,'create'])->name('contact');
Route::get('addCar',[CarController::class, 'create'])->middleware('verified')->name('addCar');
Route::get('carList',[CarController::class, 'index'])->name('carList');
Route::post('addCar',[CarController::class, 'store'])->middleware('verified');
Route::get('editCar/{id}',[CarController::class, 'edit']);
Route::put('editCar/{id}',[CarController::class, 'update'])->name('editCar');
Route::get('deleteCar/{id}',[CarController::class, 'destroy']);
Route::get('addTestmon',[CarsController::class,'testmon'])->name('addTestmon');
Route::get('single/{id}', [CarController::class, 'show'])->name('single');
Route::get('addTestmon',[addTestmony::class, 'create'])->middleware('verified')->name('addTestmon');
Route::post('addTestmon',[addTestmony::class, 'store'])->middleware('verified');
Route::get('editTestmon/{id}',[addTestmony::class, 'edit'])->middleware('verified');
Route::put('editTestmon/{id}',[addTestmony::class, 'update'])->middleware('verified')->name('editTestmon');
Route::get('deleteTestmon/{id}',[addTestmony::class, 'destroy']);
Route::get('testmonList', [addTestmony::class, 'index'])->middleware('verified')->name('testmonList');
Route::get('addCategory', [CarsController::class, 'catList'])->middleware('verified')->name('addCategory');
Route::post('addCategory',[CategoryController::class, 'store'])->middleware('verified');
Route::get('categories', [CategoryController::class, 'index'])->middleware('verified');
Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->middleware('verified');
Route::put('editCategory/{id}', [CategoryController::class, 'update'])->middleware('verified')->name('editCategory');
Route::get('deleteCategory/{id}',[CategoryController::class, 'destroy']);
Route::post('categories',[CarsController::class, 'cats'])->middleware('verified')->name('categories');
Route::get('Users', [CarsController::class, 'user'])->middleware('verified')->name('Users');
Route::get('Users', [UserController::class, 'index'])->middleware('verified')->name('Users');
Route::get('addUser',[UserController::class, 'create'])->middleware('verified')->name('addUser');
Route::post('addUser',[UserController::class, 'store'])->middleware('verified');
Route::get('editUser/{id}', [UserController::class, 'edit']);
Route::put('editUser/{id}', [UserController::class, 'update'])->name('editUser');
Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('contact',[contactController::class, 'store'])->name('send');

Route::get('message',[contactController::class, 'index'])->name('message');
Route::get('emails.showMessage/{id}',[contactController::class, 'show'])->name('emails.showMessage');
Route::get('emails.deleteMessage/{id}',[contactController::class, 'destroy']);
