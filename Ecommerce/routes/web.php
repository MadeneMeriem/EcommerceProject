<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use App\Models\Product;


Route::get('/', [HomeController::class,'home'])->name('home.index');

Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('product_details/{product}', [HomeController::class,'product_details'])->name('home.product_details');
Route::get('add_cart/{product}', [HomeController::class,'add_cart'])->middleware(['auth','verified'])->name('home.add_cart');
Route::get('mycart', [HomeController::class,'mycart'])->middleware(['auth','verified'])->name('home.mycart');
Route::delete('delete_item/{id}', [HomeController::class,'delete_item'])->middleware(['auth','verified'])->name('home.delete_item');
Route::post('make_order',[HomeController::class,'make_order'])->middleware(['auth','verified'])->name('home.make_order');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [AdminController::class,'index'])->name('admin.index')->middleware(['auth','admin']);

Route::get('view_category', [AdminController::class,'view_category'])->name('admin.view_category')->middleware(['auth','admin']);

Route::post('add_category', [AdminController::class,'add_category'])->name('admin.add_category')->middleware(['auth','admin']);

Route::get('edit_category/{category}', [AdminController::class,'edit_category'])->name('admin.edit_category')->middleware(['auth','admin']);
Route::put('update_category/{category}', [AdminController::class,'update_category'])->name('admin.update_category')->middleware(['auth','admin']);

Route::delete('delete_category/{category}', [AdminController::class,'delete_category'])->name('admin.delete_category')->middleware(['auth','admin']);


Route::post('add_product', [AdminController::class,'add_product'])->name('admin.add_product')->middleware(['auth','admin']);
Route::get('add_product_form', [AdminController::class,'add_product_form'])->name('admin.add_product_form')->middleware(['auth','admin']);

Route::get('view_product', [AdminController::class,'view_product'])->name('admin.view_product')->middleware(['auth','admin']);

Route::get('edit_product/{product}', [AdminController::class,'edit_product'])->name('admin.edit_product')->middleware(['auth','admin']);
Route::put('update_product/{product}', [AdminController::class,'update_product'])->name('admin.update_product')->middleware(['auth','admin']);

Route::get('/edit-product', function () {
    $products = Product::all();
    return view('admin.editProduct', compact('products'));
})->name('admin.edit-product');

Route::delete('delete_prodcut/{product}', [AdminController::class,'delete_product'])->name('admin.delete_product')->middleware(['auth','admin']);

Route::get('search_product', [AdminController::class,'search_product'])->name('admin.search_product')->middleware(['auth','admin']);

Route::get('order_table', [AdminController::class,'order_table'])->name('admin.order_table')->middleware(['auth','admin']);

Route::put('update_status/{order}', [AdminController::class,'update_status'])->name('admin.update_status')->middleware(['auth','admin']);



