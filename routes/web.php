<?php

//  WEBSITE ROUTE
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\SearchController;
use  App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AjaxController;

// Admin ROUTE
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;


// SEARCH PRODUCT
Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::get('/', [EcommerceController::class, 'index'])->name('home');
Route::get('/detail/{id}', [EcommerceController::class, 'detail'])->name('detail');
Route::get('/category/product/{id}', [EcommerceController::class, 'category'])->name('category.product');
Route::post('/cart/add/{id}', [CartController::class, 'index'])->name('cart.add');
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new/order', [CheckoutController::class, 'newOrder'])->name('order.new');
Route::get('/wishlist/add', [WishlistController::class, 'index'])->name('wishlist.add');
Route::get('/wishlist/create/{id}', [WishlistController::class, 'create'])->name('wishlist.create');
Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

// SOCIAL LOGIN/REGISTER
Route::get('/google/redirect', [SocialiteController::class, 'googleRedirect'])->name('google.redirect');
Route::get('/google/callback', [SocialiteController::class, 'googleCallback'])->name('google.callback');
Route::get('/facebook/redirect', [SocialiteController::class, 'facebookRedirect'])->name('facebook.redirect');
Route::get('/facebook/callback', [SocialiteController::class, 'facebookCallback'])->name('facebook.callback');


// CUSTOMER
Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
    ->name('customer.dashboard')
    ->middleware('customer');
Route::post('/sign-in', [CustomerDashboardController::class, 'signIn'])->name('sign.in');
Route::post('/sign-up', [CustomerDashboardController::class, 'signUp'])->name('sign.up');
Route::get('/customer/logout', [CustomerDashboardController::class, 'logout'])->name('customer.logout');
Route::post('/customer/profile/update', [CustomerDashboardController::class, 'update'])->name('customer.profile.update');


// SSLCOMMERZ START
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// AJAX ROUTE

Route::get('/get-product-by-id',[AjaxController::class, 'index']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add/category', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/create/category', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/add/sub-category', [SubCategoryController::class, 'index'])->name('sub-category.add');
    Route::post('/create/sub-category', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/sub-category/manage', [SubCategoryController::class, 'manage'])->name('sub-category.manage');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');
    Route::get('/get-sub-category/by/category-id', [SubCategoryController::class, 'getSubCategory'])->name('get-sub-category');

    Route::get('/unit/add', [UnitController::class, 'index'])->name('unit.add');
    Route::post('/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('unit.manage');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');

    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    Route::get('/product/add', [ProductController::class, 'index'])->name('product.add');
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

    Route::get('/customer/manage', [CustomerController::class, 'index'])->name('customer.manage');
    Route::get('/customer/detail/{id}', [CustomerController::class, 'detail'])->name('customer.detail');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');

    Route::get('/order/manage', [OrderController::class, 'index'])->name('order.manage');
    Route::get('/order/complete', [OrderController::class, 'complete'])->name('order.complete');
    Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('/order/invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
    Route::get('/order/print/{id}', [OrderController::class, 'orderPrint'])->name('invoice.print');
    Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/order/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
    Route::get('/order/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');

    Route::get('/user/add', [UserController::class, 'index'])->name('user.add');
    Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/manage', [UserController::class, 'manage'])->name('user.manage');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

});

