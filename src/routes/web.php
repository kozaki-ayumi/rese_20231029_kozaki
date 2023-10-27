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
use App\Http\Controllers\ManagerShopPageUpdateController;
use App\Http\Controllers\ManagerShopPageCreateController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\StripePaymentsController;
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
Route::get('/shop/{shop}', [ShopController::class, 'detail']);
Route::post('/shop/search', [ShopController::class, 'search']);
Route::get('/guest/menu', [MenuController::class, 'guestIndex']);

Route::group(['middleware' => 'verified'], function() {
    Route::get('/register/thanks', [MenuController::class, 'thanksIndex']);
    Route::get('/member/menu', [MenuController::class, 'memberIndex']);
    Route::get('/mypage', [MenuController::class, 'myPageIndex']);
    Route::post('/reservation/completion', [ReservationController::class, 'store']);
    Route::post('/reservation/delete', [ReservationController::class, 'delete']);
    Route::post('/reservation/update', [ReservationController::class, 'update']);
    Route::post('/shops/{shop}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/shopss/{shop}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::post('/review', [ReviewController::class, 'store']);
});

Route::group(['middleware' => ['role:admin']], function(){
    Route::get('/manager/register', [AdminManagementController::class, 'index']);
    Route::post('/manager/register/confirm', [AdminManagementController::class, 'create']);
});


Route::group(['middleware' => ['role:manager']], function(){
    Route::get('/manager/reservationlist', [ManagerManagementController::class, 'reservationListIndex']);
    Route::post('/manager/reservation/search', [ManagerManagementController::class, 'search']);
    Route::get('/manager/mail', [MailController::class, 'mailCreateIndex']);
    Route::post('/mail/send', [MailController::class, 'send']);
    Route::get('/payment/screen', [StripePaymentsController::class, 'index']);
    Route::get('/payment/amount', [StripePaymentsController::class, 'amount']);
    Route::post('payment', [StripePaymentsController::class, 'payment']);
    Route::get('/manager/shoppage', [ManagerShopPageUpdateController::class, 'shopPageIndex']);
    Route::get('/manager/shop/list',[ManagerShopPageUpdateController::class, 'shopListIndex']);
    Route::get('/manager/shop/draft',    [ManagerShopPageCreateController::class, 'shopRegisterIndex'])->name("form.register");
    Route::post('/manager/shop/register/confirm', [ManagerShopPageCreateController::class, 'registerConfirm']);
    Route::post('/manager/shop/register', [ManagerShopPageCreateController::class, 'create']);
    Route::get('/manager/shop/{shop}', [ManagerShopPageUpdateController::class, 'shopModify']);
    Route::post('/manager/shop/confirm', [ManagerShopPageUpdateController::class, 'updateConfirm']);
    Route::post('/manager/shop/update', [ManagerShopPageUpdateController::class, 'update']);

});

Route::get('/top', [QrCodeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

require __DIR__.'/auth.php';





