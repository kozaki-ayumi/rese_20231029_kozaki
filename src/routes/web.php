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
//use App\Http\Controllers\ManagerAreaGenreController;
use App\Http\Controllers\ManagerShopPageUpdateController;
use App\Http\Controllers\ManagerShopPageCreateController;
use App\Http\Controllers\TestMailController;
use App\Http\Controllers\QrCodeController;

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


//Route::middleware(['verified'])->group(function(){
 // Route::get('/', [ShopController::class, 'index']);
//});

Route::get('/', [ShopController::class, 'index']);
Route::post('/shop/search', [ShopController::class, 'search']);
Route::get('/shop/{shop}', [ShopController::class, 'detail']);

Route::get('/guest/menu', [MenuController::class, 'index']);
Route::get('/register', [MenuController::class, 'register']);


Route::group(['middleware' => 'verified'], function() {
  Route::get('/register/thanks', [MenuController::class, 'thanksIndex']);
  Route::get('/member/menu', [MenuController::class, 'index2']);
  Route::get('/mypage', [MenuController::class, 'myPageIndex']);

  Route::post('/reservation/completion', [ReservationController::class, 'store']);
  Route::post('/reservation/delete', [ReservationController::class, 'delete']);
  Route::patch('/reservation/change', [ReservationController::class, 'update']);

  Route::post('/review', [ReviewController::class, 'store']);

  Route::post('/shops/{shop}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
  Route::delete('/shopss/{shop}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
});


Route::group(['middleware' => ['role:admin']], function(){
  Route::get('/manager/register', [AdminManagementController::class, 'index']);
  Route::post('/manager/register/confirm', [AdminManagementController::class, 'create']);
});


Route::group(['middleware' => ['role:manager']], function(){
  Route::get('/manager/reservationlist', [ManagerManagementController::class, 'reservationListIndex']);
  Route::post('/manager/reservation/search', [ManagerManagementController::class, 'search']);

  
  Route::get('/manager/shoppage', [ManagerShopPageUpdateController::class, 'shopPageIndex']);
  Route::get('/manager/shop/list', [ManagerShopPageUpdateController::class, 'shopListIndex']);


  //Route::get('/manager/area/genre', [ManagerAreaGenreController::class, 'areaGenreIndex']);
  //Route::post('/manager/area/register', [ManagerAreaGenreController::class, 'areaStore']);
  //Route::post('/manager/genre/register', [ManagerAreaGenreController::class, 'genreStore']);
  //Route::post('/manager/area/delete', [ManagerAreaGenreController::class, 'areaDelete']);
  //Route::delete('/manager/genre/delete', [ManagerAreaGenreController::class, 'genreDelete']);


  Route::get('/manager/shop/draft', [ManagerShopPageCreateController::class, 'shopRegisterIndex'])->name("form.register");
  Route::get('/manager/shop/{shop}', [ManagerShopPageUpdateController::class, 'shopModify']);

  Route::post('/manager/shop/confirm', [ManagerShopPageUpdateController::class, 'updateConfirm']);
  Route::post('/manager/shop/update', [ManagerShopPageUpdateController::class, 'update']);

  Route::post('/manager/shop/register/confirm', [ManagerShopPageCreateController::class, 'registerConfirm']);
  Route::post('/manager/shop/register', [ManagerShopPageCreateController::class, 'create']);


  Route::get('/manager/mail', [ManagerManagementController::class, 'mailCreateIndex']);
  Route::post('/mail/send', [TestMailController::class, 'send']);
  //Route::post('/mail/send', [TestMailController::class, 'send']);
  //Route::get('/manager/mail/draft', [ManagerManagementController::class, 'mailIndex']);


  
});

Route::get('/top', [QrCodeController::class, 'index']);
//Route::post('/mail/send', [TestMailController::class, 'send']);






Route::get('/dashboard', function () {
  return view('register_thanks');
})->middleware(['auth','verified'])->name('dashboard');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::prefix('admin')->name('admin.')->group(function(){
    //Route::get('/menu', function () {
       // return view('admin_menu');
   // })->middleware(['auth:admin'])->name('dashboard');

    //Route::middleware('auth:admin')->group(function () {
      //  Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
      //  Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
       // Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    //});

    //require __DIR__.'/admin.php';
    //});





