<?php

use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Redirect default route to home
Route::get('/', function () {
    return redirect()->route('home');
});

// Route for Homepage
Route::get('/home', [ProductController::class, 'home'])->name('home');
// Route for Handle Search Page
Route::get('/search', [ProductController::class, 'handleSearch'])->name('post.search');
// Handle Of All Product
Route::get('/product/detail/{id}', [ProductController::class, 'handleDetail']);
// Handle Logout user
Route::post('/logout', [UserController::class, 'handleLogout']);

// Login Page and handle Form Login
Route::get('/login', function () {
    return view('page.login');
})->name('login');

Route::post('/handleLogin', [UserController::class, 'handleLogin']);


// Register Page and handle Form Register
Route::get('/register', [UserController::class, 'registerPage'])->name('register');
Route::post('/handleRegister', [UserController::class, 'handleRegister']);



/**
 * Member Route Only
 * @return Authentication
 */
Route::middleware('role.auth:member')->group(function () {
    Route::post('/handleCart', [CartItemsController::class, 'handleCart'])->name('posts.cart');
    Route::get('/my-cart', [CartItemsController::class, 'cartPage'])->name('get.cart');

    // Handle Button Edit And Delete
    Route::get('/my-cart/{id}/edit', [CartItemsController::class, 'editPage']);
    Route::post('/my-cart/{id}/edit', [CartItemsController::class, 'handleUpdate']);
    Route::post('/my-cart/{id}/delete', [CartItemsController::class, 'handleDelete']);


    Route::post('/my-cart', [OrderItemController::class, 'handleCheckout'])->name('posts.order');
    Route::get('/my-transactions', [OrderItemController::class, 'transactionPage'])->name('get.transactions');
});


/**
 * Admin Route Only
 * @return Authentication
 */
Route::middleware('role.auth:admin')->group(function () {
    //  Handle Product Route
    Route::get('/view-product', [ProductController::class, 'viewProductPage'])->name('get.product_view');

    // Handle Button Edit Delete on Product Page
    Route::get('/product/{id}/edit', [ProductController::class, 'handleUpdate']);
    Route::post('/product/edit', [ProductController::class, 'handleEdit'])->name('post.edit');
    Route::post('/product/{id}/delete', [ProductController::class, 'handleDelete']);

    // Handle Insert Product Page
    Route::get('/add-product', [ProductController::class, 'insertProductPage']);
    Route::post('/add-product/post', [ProductController::class, 'handleInsertProduct'])->name('post.insertProduct');

    // Handle Category Page
    Route::get('/view-category', [ProductCategoriesController::class, 'categoryPage'])->name('get.category_page');
    Route::get('/add-category', [ProductCategoriesController::class, 'addCategoriesProductPage']);
    Route::post('/add-category', [ProductCategoriesController::class, 'insertCategory'])->name('post.add_category');

    // Handle Edit Button Category
    Route::get('/category/{id}/edit', [ProductCategoriesController::class, 'editCategory']);
    Route::post('/category/edit', [ProductCategoriesController::class, 'handleEditCategory'])->name('post.edit_category');

    // Handle Button Delete Category
    Route::post('/category/{id}/delete', [ProductCategoriesController::class, 'handleDeleteCategory']);
});
