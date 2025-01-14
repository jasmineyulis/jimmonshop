<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileDashboardController;
use App\Http\Controllers\StakeholderController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EventDashboardController;
use App\Http\Controllers\ProductDashboardController;
use App\Http\Controllers\CategoryDashboardController;
use App\Http\Controllers\DashboardUserEventController;
use App\Http\Controllers\DashboardUserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterEventController;

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

Route::get('/', [HomeController::class,'index']);

Route::get('/about+us', [StakeholderController::class,'index']);

Route::get('/about+us/{stakeholder:slug}', [StakeholderController::class,'show']);

Route::get('/contact+us', function() {
    return view('contactUs', [
        'title' => 'Contact Us'
    ]);
});

Route::resource('/events', EventController::class);

Route::resource('/products', ProductController::class);

Route::get('/products/category/{kategori:slug}', [KategoriController::class,'show']);

Route::get('/sign+in',[SigninController::class,'index'])->name('login')->middleware('guest');

Route::post('/sign+in',[SigninController::class,'authenticate']);

Route::post('/logout',[SigninController::class,'logout']);

Route::get('/registration',[RegistrationController::class,'index'])->middleware('guest');

Route::post('/registration',[RegistrationController::class,'store']);

Route::middleware('auth:admin')->group(function() {

    Route::get('/dashboard', [ProfileDashboardController::class, 'index']);

    Route::get('/dashboard/{admin}/edit', [ProfileDashboardController::class, 'edit']);

    Route::put('/dashboard', [ProfileDashboardController::class, 'update']);

    Route::delete('/dashboard', [ProfileDashboardController::class, 'destroy']);

    Route::get('/dashboard/categories/create', [CategoryDashboardController::class,'create']);

    Route::get('/dashboard/categories/{kategori:slug}', [CategoryDashboardController::class,'show']);

    Route::get('/dashboard/categories/{kategori}/edit', [CategoryDashboardController::class,'edit']);

    Route::post('/dashboard/categories', [CategoryDashboardController::class,'store']);

    Route::delete('/dashboard/categories/{kategori:slug}', [CategoryDashboardController::class,'destroy']);

    Route::put('/dashboard/categories/{kategori:slug}', [CategoryDashboardController::class,'update']);

    Route::resource('/dashboard/categories', CategoryDashboardController::class);

    Route::resource('/dashboard/products', ProductDashboardController::class);

    Route::resource('/dashboard/events', EventDashboardController::class);

    Route::get('/dashboard/events/{slug}/partisipant', [EventDashboardController::class, 'partisipant']);

});

Route::middleware('auth')->group(function() {

    Route::resource('/dashboard/my/profile', DashboardUserProfileController::class);

    Route::put('/dashboard/my/profile', [DashboardUserProfileController::class, 'update']);

    Route::delete('/dashboard/my/profile', [DashboardUserProfileController::class, 'destroy']);

    Route::get('/register+event/{event:slug}', [RegisterEventController::class, 'index']);

    Route::post('/register+event/{event:slug}', [RegisterEventController::class, 'store']);

    Route::resource('/dashboard/my/register_event', DashboardUserEventController::class);

    Route::post('/product/{slug}/purchase', [PurchaseController::class, 'index']);

});
