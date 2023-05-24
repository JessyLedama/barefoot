<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Safari;
use App\Models\Category;
use App\mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\SafariController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/safaris/{safari}', 'Customer\HomeController@show');

Route::get('/kenya-safaris/', 'Customer\HomeController@kenyaSafaris');

Route::get('/kenya-local-safaris/', 'Customer\HomeController@kenyaLocalSafaris');

Route::get('/kenya-multiple-day-safaris/', 'Customer\HomeController@kenyaMultipleDaySafaris');

Route::get('/uganda-safaris/', 'Customer\HomeController@ugandaSafaris');

Route::get('/tanzania-safaris/', 'Customer\HomeController@tanzaniaSafaris');

Route::get('/gallery/', 'Customer\HomeController@gallery');

Route::get('/booking/{safari}', 'Customer\HomeController@booking');
Route::post('booking.store', 'Customer\HomeController@storeBooking')->name('booking.store');

Route::get('/contact-us/', function(){
    return view('customer.contact-us');
});
 
Route::get('/tourist-locations/', 'Dashboard\TouristLocationsController@index');
Route::get('/location/{location}', 'Customer\TouristLocationsController@show');

Route::get('/frequently-asked-questions/', function(){
    return view('customer.faq');
});

Route::get('/about-us/', function(){
    return view('customer.about-us');
});

Route::get('/contact-us/', function(){
    return view('customer.contact-us');
});

Route::post('/contact-us/', function(Request $request){
    Mail::send(new ContactMail($request));
    return view('customer.contact-us');
});

/* Authentication Routes */
Route::get('login/facebook', 'Auth\SocialAuthController@redirectToFacebook')->name('login.facebook');

Route::get('auth/callback/facebook', 'Auth\SocialAuthController@handleFacebookCallback');

Route::get('login/google', 'Auth\SocialAuthController@redirectToGoogle')->name('login.google');

Route::get('auth/callback/google', 'Auth\SocialAuthController@handleGoogleCallback');

/**
 * Customer pages  
 */

Route::get('home', 'Customer\HomeController@home')->name('home');

Route::get('search', 'Customer\SearchController@search')->name('search');

Route::get('category/{slug}', 'Customer\CategoryController@show')->name('category.page');

Route::get('subcategory/{slug}', 'Customer\SubCategoryController@show')->name('subcategory.page');

Route::view('cart', 'customer.cart')->name('cart.page');

Route::get('cart/safaris', 'Customer\CartController@safaris')->name('cart.safaris');

Route::view('checkout', 'customer.checkout')->name('checkout')->middleware('auth');

Route::resource('safari', 'Customer\SafariController')->only(['index', 'store', 'show'])->names([

    'index' => 'customer.safari.index',
    'store' => 'customer.safari.store',
    'show' => 'customer.safari.show' 
]);


Route::prefix('safari')->group(function () {

    Route::post('like', 'Customer\SafariController@like')->name('safari.like');

    Route::delete('unlike', 'Customer\SafariController@unlike')->name('safari.unlike');

    Route::post('review', 'Customer\SafariController@review')->name('safari.review');

    Route::get('{slug->id}', 'Customer\SafariController@show')->name('safari.page');
});

Route::prefix('account')->group(function () {

    Route::middleware('auth')->group(function () {

        Route::name('customer.profile.')->group(function () {

            Route::get('menu', 'Customer\AccountController@menu')->name('menu');

            Route::get('edit', 'Customer\AccountController@edit')->name('edit');
    
            Route::put('update', 'Customer\AccountController@update')->name('update');
        });

        Route::resource('address-book', 'Customer\AddressController')->except('show')->parameters([

            'address-book' => 'address'
    
        ])->names([
    
            'index' => 'customer.address',
            'create' => 'customer.address.create',
            'store' => 'customer.address.store',
            'edit' => 'customer.address.edit',
            'update' => 'customer.address.update',
            'destroy' => 'customer.address.destroy',
            'bookings' => 'customer.bookings'
    
        ]);

        Route::resource('safari', 'Customer\SafariController')->only([

            'index', 'store', 'show'
    
        ])->names([
    
            'index' => 'customer.safari',
            'store' => 'customer.safari.store',
            'show' => 'customer.safari.show'
    
        ]);

        Route::resource('wishlist', 'Customer\WishlistController')->only([

            'index', 'store', 'destroy'
    
        ])->names([
    
            'index' => 'customer.wishlist',
            'store' => 'customer.wishlist.store',
            'destroy' => 'customer.wishlist.destroy'
    
        ])->parameters([

            'wishlist' => 'id'
        ]);
    });
});



/**
 * Dashboard
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->middleware(['auth', ])->group(function () { 
    
    // Categories
    Route::prefix('categories')->group(function(){
        Route::get('index', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('create', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('edit', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    // Subcategories
    Route::prefix('subcategories')->group(function(){
        Route::get('index', [SubCategoryController::class, 'index'])->name('admin.subcategories.index');
        Route::get('create', [SubCategoryController::class, 'create'])->name('admin.subcategories.create');
        Route::post('create', [SubCategoryController::class, 'store'])->name('admin.subcategories.store');
        Route::get('edit', [SubCategoryController::class, 'edit'])->name('admin.subcategories.edit');
        Route::get('/delete', [SubCategoryController::class, 'destroy'])->name('admin.subcategories.destroy');
    });

    // Safaris
    Route::prefix('safaris')->group(function(){
        Route::get('index', [SafariController::class, 'index'])->name('admin.safaris.index');
        Route::get('create', [SafariController::class, 'create'])->name('admin.safaris.create');
        Route::post('create', [SafariController::class, 'store'])->name('admin.safaris.store');
        Route::get('edit', [SafariController::class, 'edit'])->name('admin.safaris.edit');
        Route::delete('/delete', [SafariController::class, 'destroy'])->name('admin.safaris.destroy');
        Route::delete('safari/{safari}/delete/gallery', [SafariController::class, 'destroyInGallery'])->name('safari.destroy.gallery');
        
    });

    Route::view('menu', 'dashboard.mobile-menu')->name('dashboard.menu');
    
    Route::post('safari/save', [SafariControllerstore')->name('safari.store');

    Route::resource('safari', 'Dashboard\SafariController')->except(['store']);

    Route::resource('safari', 'Dashboard\SafariController')->except(['create', 'show', 'store']);

    Route::get('account', 'Dashboard\AccountController@edit')->name('account.edit');

    Route::put('account/update', 'Dashboard\AccountController@update')->name('account.update');

    Route::post('location/save', 'Dashboard\TouristLocationsController@store')->name('location.store');

    Route::resource('location', 'Dashboard\TouristLocationsController')->except(['store']);

    Route::resource('location', 'Dashboard\TouristLocationsController')->except(['create', 'show', 'store']);

    Route::get('safari/edit-price/{safari}', 'Dashboard\SafariController@edit_price')->name('safari.edit-price');

    Route::post('safari/update_price/{safari}', 'Dashboard\SafariController@update_price')->name('safari.update_price');
});

require __DIR__.'/auth.php';
