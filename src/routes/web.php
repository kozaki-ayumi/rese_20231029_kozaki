<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\ManagerManagementController;
use App\Http\Controllers\ManagerShopPageController;
use App\Http\Controllers\TestMailController;

use App\Http\Controllers\ManagerMenuController;
use App\Http\Controllers\ProfileController as ProfileOfAdminController;


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

Route::get('/', [ShopController::class, 'index']);
Route::post('/shop/search', [ShopController::class, 'search']);
Route::get('/shop/{shop}', [ShopController::class, 'detail']);

Route::post('/reservation/completion', [ReservationController::class, 'store']);
Route::post('/reservation/delete', [ReservationController::class, 'delete']);
Route::patch('/reservation/change', [ReservationController::class, 'update']);


Route::get('/guest/menu', [MenuController::class, 'index']);
Route::get('/register', [MenuController::class, 'register']);

Route::get('/member/menu', [MenuController::class, 'index2']);
Route::get('/mypage', [MenuController::class, 'myPageIndex']);

Route::get('/manager/menu', [MenuController::class, 'index3']);




Route::post('/shops/{shop}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
Route::delete('/shopss/{shop}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');

Route::get('/admin/manager/register', [AdminManagementController::class, 'index']);
Route::post('/admin/manager/register/confirm', [AdminManagementController::class, 'create']);


Route::get('/manager/mail/draft', [ManagerManagementController::class, 'mailIndex']);

Route::get('/manager/reservationlist', [ManagerManagementController::class, 'reservationListIndex']);
Route::post('/manager/reservation/search', [ManagerManagementController::class, 'search']);

Route::get('/manager/shoppage', [ManagerShopPageController::class, 'shopListIndex']);
Route::get('/manager/shop/draft', [ManagerShopPageController::class, 'shopRegisterIndex']);
Route::get('/manager/shop/{shop}', [ManagerShopPageController::class, 'shopModify']);

Route::post('/manager/shop/confirm', [ManagerShopPageController::class, 'updateConfirm']);
Route::post('/manager/shop/update', [ManagerShopPageController::class, 'update']);

Route::post('/manager/shop/register/confirm', [ManagerShopPageController::class, 'registerConfirm']);
Route::post('/manager/shop/register', [ManagerShopPageController::class, 'create']);


Route::get('/mail/send', [TestMailController::class, 'send']);

Route::get('/top', 'App\Http\Controllers\ManagerManagementController@index');










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/menu', function () {
        return view('admin_menu');
    })->middleware(['auth:admin'])->name('dashboard');

    //Route::middleware('auth:admin')->group(function () {
      //  Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
      //  Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
       // Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    //});

    require __DIR__.'/admin.php';
    });



