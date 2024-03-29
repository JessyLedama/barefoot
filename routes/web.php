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
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\TouristLocationsController;
use App\Http\Controllers\Dashboard\TouristLocationsController as AdminTourist;
use App\Http\Controllers\Customer\AccountController;
use App\Http\Controllers\Customer\SubCategoryController as CustomerSubcategory;
use App\Http\Controllers\Customer\BookingController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/safaris/{safari}', [HomeController::class, 'show']);

Route::get('/kenya-safaris/', [HomeController::class, 'kenyaSafaris']);

Route::get('/kenya-local-safaris/', 'Customer\HomeController@kenyaLocalSafaris');

Route::get('/kenya-multiple-day-safaris/', 'Customer\HomeController@kenyaMultipleDaySafaris');

Route::get('/uganda-safaris/', [HomeController::class, 'ugandaSafaris']);

Route::get('/tanzania-safaris/', [HomeController::class, 'tanzaniaSafaris']);

Route::get('/gallery/', [HomeController::class, 'gallery']);

Route::get('/booking/{safari}', [HomeController::class, 'booking']);
Route::post('booking.store', [HomeController::class, 'storeBooking'])->name('booking.store');

Route::get('/contact-us/', function(){
    return view('customer.contact-us');
});
 
Route::get('/tourist-locations', [TouristLocationsController::class, 'index']);
Route::get('/location/{location}', [TouristLocationsController::class, 'show']);

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

Route::get('subcategory/{slug}', [CustomerSubcategory::class, 'show'])->name('subcategory.page');

Route::view('cart', 'customer.cart')->name('cart.page');

Route::get('cart/safaris', 'Customer\CartController@safaris')->name('cart.safaris');

Route::view('checkout', 'customer.checkout')->name('checkout')->middleware('auth');

Route::resource('safari', 'Customer\SafariController')->only(['index', 'store', 'show'])->names([

    'index' => 'customer.safari.index',
    'store' => 'customer.safari.store',
    'show' => 'customer.safari.show' 
]);

// customer safari
Route::prefix('safari')->group(function () {

    Route::post('like', 'Customer\SafariController@like')->name('safari.like');

    Route::delete('unlike', 'Customer\SafariController@unlike')->name('safari.unlike');

    Route::post('review', 'Customer\SafariController@review')->name('safari.review');

    Route::get('{slug->id}', 'Customer\SafariController@show')->name('safari.page');
});

// Account
Route::prefix('account')->group(function () {

    Route::middleware('auth')->group(function () {

        Route::name('customer.profile.')->group(function () {

            Route::get('menu', [AccountController::class, 'menu'])->name('menu');

            Route::get('edit', [AccountController::class, 'edit'])->name('edit');
    
            Route::put('update', [AccountController::class, 'update'])->name('update');
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
        Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/edit/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    // Subcategories
    Route::prefix('subcategories')->group(function(){
        Route::get('index', [SubCategoryController::class, 'index'])->name('admin.subcategories.index');
        Route::get('create', [SubCategoryController::class, 'create'])->name('admin.subcategories.create');
        Route::post('create', [SubCategoryController::class, 'store'])->name('admin.subcategories.store');
        Route::get('/edit{subCategory}', [SubCategoryController::class, 'edit'])->name('admin.subcategories.edit');
        Route::post('/edit/{subCategory}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
        Route::get('/delete', [SubCategoryController::class, 'destroy'])->name('admin.subcategories.destroy');
    });

    // Safaris
    Route::prefix('safaris')->group(function(){
        Route::get('index', [SafariController::class, 'index'])->name('admin.safaris.index');
        Route::get('create', [SafariController::class, 'create'])->name('admin.safaris.create');
        Route::post('create', [SafariController::class, 'store'])->name('admin.safaris.store');
        Route::get('edit/{safari}', [SafariController::class, 'edit'])->name('admin.safaris.edit');
        Route::post('/edit/{safari}', [SafariController::class, 'update'])->name('admin.safari.update');
        Route::delete('/delete', [SafariController::class, 'destroy'])->name('admin.safaris.destroy');
        Route::delete('safaris/{safari}/delete/gallery', [SafariController::class, 'destroyInGallery'])->name('safari.destroy.gallery');
        
    });

    // Bookings
    Route::prefix('bookings')->group(function(){
        Route::get('index', [BookingController::class, 'index'])->name('admin.bookings.index');
        Route::get('create', [BookingController::class, 'create'])->name('admin.bookings.create');
        Route::post('create', [BookingController::class, 'store'])->name('admin.bookings.store');
        Route::get('edit', [BookingController::class, 'edit'])->name('admin.bookings.edit');
        Route::delete('/delete', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
        Route::delete('bookings/{booking}/delete/gallery', [BookingController::class, 'destroyInGallery'])->name('booking.destroy.gallery');
        
    });

    Route::view('menu', 'dashboard.mobile-menu')->name('dashboard.menu');

    Route::get('account', [AccountController::class, 'edit'])->name('account.edit');

    Route::put('account/update', [AccountController::class, 'update'])->name('account.update');

    // Tourist Locations
    Route::prefix('tourist-locations')->group(function(){
        
        Route::get('index', [AdminTourist::class, 'index'])->name('admin.locations.index');

        Route::get('{location}', [AdminTourist::class, 'show'])->name('admin.locations.show');

        Route::get('create', [AdminTourist::class, 'create'])->name('admin.locations.create');

        Route::post('create', [AdminTourist::class, 'store'])->name('admin.locations.store');
    });


    Route::get('safari/edit-price/{safari}', 'Dashboard\SafariController@edit_price')->name('safari.edit-price');

    Route::post('safari/update_price/{safari}', 'Dashboard\SafariController@update_price')->name('safari.update_price');
});

/**
 * 
 * Method for creating symlink in cpanel.
 *  Just run baseurl/symlink
 *  
 **/

Route::get('/symlink', function(){
    
    $target = '/home/barefoo3/bar/storage/app/public';
    $shortcut = '/home/barefoo3/public_html/storage';
    symlink($target, $shortcut);
    
    session()->flash('success', 'Symlink has been created. ');

});

require __DIR__.'/auth.php';
