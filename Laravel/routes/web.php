<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\confirmController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetail;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ratingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrackingController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/',[ContactController::class, 'saveEmail'])->name('contact.email');
    Route::get('product',[ProductListController::class, 'index'])->name('product-list');
    Route::get('search', [SearchController::class, 'searchClient'])->name('search');
    Route::post('comment/add',[CommentController::class, 'addComment'])->name('comment.add');
    Route::post('comment/reply',[CommentController::class, 'reply'])->name('comment.rep');
    Route::post('/review',[ratingController::class, 'addRating'])->name('rating');
    // sortType cực chuối
    Route::get('category/{category}',[ProductListController::class,'sortByCate'])->name('sortByCate');
    // sortSize
    Route::get('size/{size}',[ProductListController::class,'sortBySize'])->name('sortBySize');

    Route::get('contact',[ContactController::class, 'index'])->name('contact-form');
    Route::post('contact',[ContactController::class, 'save'])->name('contact.store');
    Route::get('product-detail/{product}', [ProductDetail::class, 'index'])->name('product');
    // cart
    Route::get('cart',[CartController::class,'index'])->name('cart');
    Route::get('add-to-cart/{product}', [ProductListController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
    Route::post('test',[ProductListController::class,'sortByPrice'])->name('sortByPrice');
    Route::get('/checkout',function(){
        return view('checkout');
    })->name('checkout')->middleware(['auth']);
    Route::post('/checkout',[CheckoutController::class,'index'])->name('addTransaction')->middleware(['auth']);
    Route::get('/tracking',[TrackingController::class,'index'])->name('tracking')->middleware(['auth']);
    Route::get('/cancel/{id}',[TrackingController::class,'cancel'])->name('cancel');

});

Auth::routes();
Route::get('auth/login-google',[LoginController::class,'getLoginGoogle'])->name('loginGoogle');
Route::get('auth/google/callback',[LoginController::class,'LoginGoogleCallback'])->name('callbackLogin');
Route::post('auth/create',[LoginController::class,'saveGoogle'])->name('SaveGoogle');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('user.list');
    Route::get('/users/create', [UsersController::class, 'user_create'])->name('user.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('user.store');
    Route::get('changeRole/{id}',[UsersController::class,'changeRole'])->name('changeRole');
    Route::resource('products',ProductController::class);
    Route::get('product/changeStatus',[ProductController::class,'changeStatus'])->name('product_changeStatus');
    Route::get('contact',[ContactController::class,'show'])->name('admin.contact');
    Route::get('category',[CategoryController::class,'index'])->name('category');
    Route::get('size',[SizeController::class,'index'])->name('size');
    Route::get('transaction',[TransactionController::class,'index'])->name('transaction.list');
    Route::get('transaction/{transaction}',[TransactionController::class,'show'])->name('transaction.show');
    Route::post('transaction/changeStatus',[TransactionController::class,'changeStatus'])->name('change_trans');
    // Route::get('/search','ProductController@search');
});
Route::get('products/search',[ProductController::class,'search'])->name('product-search');
