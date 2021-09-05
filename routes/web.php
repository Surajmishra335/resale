<?php

use GuzzleHttp\Middleware;
use App\Models\Childcategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FraudController;
use App\Http\Controllers\SaveAdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\AdminListingController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\ContactpageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitesettingController;

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



Route::get('/', [HomepageController::class, 'index'])->name('home');



//admin

Route::group(['prefix' => 'auth', 'middleware' => 'admin'], function(){

    //Homepage
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin');

    //category
    Route::resource('/category', CategoryController::class);

    //subcategory
    Route::resource('/subcategory', SubcategoryController::class);

    //childcategory
    Route::resource('/childcategory', ChildCategoryController::class);

    //Admin ads list
    Route::get('/allads', [AdminListingController::class, 'index'])->name('admin.allads');

    //listing reported ads
    Route::get('/reported-ads', [FraudController::class, 'index'])->name('admin.all.reported.ads');

    //site setting
    Route::get('/site-setting', [SitesettingController::class, 'index'])->name('admin.sitesetting');
    Route::post('/site-setting-save', [SitesettingController::class, 'save'])->name('admin.setting.save');
    
    
});

//404 page

Route::fallback(function () {
    return view('404');
});

//ads
Route::get('/ads/create', [AdvertisementController::class, 'create'])->middleware('auth')->name('ads.create');
Route::post('/ads/store', [AdvertisementController::class, 'store'])->middleware('auth')->name('ads.store');
Route::get('/ads', [AdvertisementController::class, 'index'])->name('ads.index')->middleware('auth');
Route::get('/ads/{id}/edit', [AdvertisementController::class, 'edit'])->name('ad.edit')->middleware('auth');
Route::put('/ads/{id}/update', [AdvertisementController::class, 'update'])->name('ad.update')->middleware('auth');
Route::delete('/ads/{id}/delete', [AdvertisementController::class, 'destroy'])->name('ad.delete')->middleware('auth');

//pending ads
Route::get('/ads/pending', [AdvertisementController::class, 'pendingAds'])->name('ads.pending')->middleware('auth');


//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

//User Profile seen by other users
Route::get('/ads/{userId}/view', [FrontendController::class, 'viewuserAds'])->name('show.user.ads');

//frontpage Ads 

Route::get('/product/{categorySlug}', [FrontendController::class, 'findBasedOnCategory'])->name('category.show');
Route::get('/product/{categorySlug}/{subcategorySlug}', [FrontendController::class, 'findBasedOnSubcategory'])->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}', [FrontendController::class, 'findBasedOnChildcategory'])->name('childcategory.show');

//product full page
Route::get('/products/{id}/{slug}', [FrontendController::class, 'show'])->name('product.view');

//message
Route::post('/send/message',[SendMessageController::class, 'store'])->middleware('auth');
Route::get('/messages',[SendMessageController::class, 'index'])->name('messages')->middleware('auth');
Route::get('/users',[SendMessageController::class, 'chatWithThisUser'])->middleware('auth');
Route::get('/message/user/{id}',[SendMessageController::class ,'showMessages'])->middleware('auth');
Route::post('/start-conversation',[SendMessageController::class, 'startConversation']);

//save ads
Route::post('/ad/save', [SaveAdController::class, 'saveAd'])->middleware('auth')->name('save.ad');
Route::post('/ad/remove', [SaveAdController::class, 'removeAd'])->name('ad.remove');
Route::get('/saved-ads', [SaveAdController ::class, 'getMyads'])->name('saved.ad');

//Report The ad
Route::post('/report-this-ad', [FraudController::class, 'store'])->name('report.ad');

//search 
Route::get('/search', [HomepageController::class, 'search'])->name('search');

//contact page
Route::get('/contact', [ContactpageController::class, 'index'])->name('contact');
Route::post('/contact/save', [ContactpageController::class, 'save'])->name('contact.save');

//all other pages loading view only
Route::get('/about-us', [PageController::class, 'about'])->name('about');

