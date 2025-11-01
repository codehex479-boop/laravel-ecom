<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[UserController::class,'Product_homepage']);

Route::get('/cart', function () {
    return view('cart');
});
Route::delete('/cart/{id}', [UserController::class, 'destroy'])->name('cart.delete');
Route::post('/cart/{id?}',[UserController::class,'Add_to_cart']);
Route::get('/cart',[UserController::class,'Cart_item']);


Route::get('/updatecart', function () {
    return view('updatecart');
});

Route::get('/checkoutpage', function () {
    return view('checkoutpage');
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);


Route::get('/register', function () {
    return view('register');
});
Route::post('/register',[UserController::class,'Register']);

Route::get('/product', function () {
    return view('product');
});
Route::get('/product/{id?}',[UserController::class,'Product_page']);

Route::get('/shophere', function () {
    return view('shophere');
});
Route::get('/shophere',[UserController::class,'Product']);

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/successpage', function () {
    return view('successpage');
});

Route::get('/shop/{id}',[UserController::class,'Shop_homepage']);

Route::get('/successpage', function () {
    return view('successpage');
});

// AdminPanel Files Route 


Route::get('/admin/login', function () {
    return view('admin.adminlogin');
});

Route::get('/admin/categories', function () {
    return view('admin.categories');
});

Route::post('/admin/categories',[UserController::class,'categories']);
Route::get('/admin/categories',[UserController::class,'show_category']);
Route::get('/admin/categories/{id}',[UserController::class,'admin_category_delete']);



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/manageproducts', function () {
    return view('admin.manageproducts');
});
Route::post('/admin/manageproducts',[UserController::class,'Manage_products']);
Route::get('/admin/manageproducts',[UserController::class,'Manage_products_two']);
Route::get('/admin/manageproducts/{id}',[UserController::class,'admin_product_delete']);

Route::get('/admin/manageusers', function () {
    return view('admin.manageusers');
});
Route::get('/admin/manageusers',[UserController::class,'show_User']);

Route::get('/admin/orders', function () {
    return view('admin.orders');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
