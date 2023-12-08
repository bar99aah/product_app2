<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
// use App\Http\Middleware\Authenticate;
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
    // return view('welcome');
    return redirect()->route('products.index');
});
Route::get('/home', function () {
    // return view('welcome');
    return redirect()->route('products.index');
});
// Route::prefix('/products')->group(function(){
//     Route::get('/index', [ProductController::class, 'index'])->name('product.index');
//     Route::post('/store', [ProductController::class, 'store'])->name('product.store');
//     Route::get('/edit', [ProductController::class, 'edit'])->name('product.edit');
//     Route::put('/update', [ProductController::class, 'update'])->name('product.update');
//     Route::get('/create', [ProductController::class, 'create'])->name('product.create');
//     Route::get('/delete', [ProductController::class,'destroy'])->name('product.delete');
// });

//OR all method in one route
Route::resource('products', ProductController::class);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
