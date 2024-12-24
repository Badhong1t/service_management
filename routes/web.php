<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Backend\FAQController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\AdminController;
use App\Http\Controllers\Web\Backend\SocalmediaContoller;
use App\Http\Controllers\Web\Backend\DynamicPageController;
use App\Http\Controllers\Web\Backend\CMS\FeaturedController;
use App\Http\Controllers\Web\Backend\SystemSettingController;
use App\Http\Controllers\Web\Backend\CMS\HeroBannerController;
use App\Http\Controllers\Web\Backend\CMS\LookingForController;
use App\Http\Controllers\Web\Backend\CMS\CommunityCloaseController;
use App\Http\Controllers\Web\Backend\BusinessVarificationController;
use App\Http\Controllers\Web\Backend\CMS\ConnectCommunityController;
use App\Http\Controllers\Web\Backend\CMS\MaximizeCommunityController;
use App\Http\Controllers\Web\Backend\ProfessionalVarificationController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::controller(SystemSettingController::class)->group(function () {
        Route::get('/system-setting', 'index')->name('system.setting');
        Route::post('/system-setting', 'update')->name('system.update');
        Route::get('/system/mail', 'mailSetting')->name('system.mail.index');
        Route::post('/system/mail', 'mailSettingUpdate')->name('system.mail.update');
        Route::get('/system/profile', 'profileindex')->name('profilesetting');
        Route::get('/system/stripe', 'stripeindex')->name('stripe.index');
        Route::post('/system/stripe', 'stripestore')->name('stripe.store');
        Route::get('/system/paypal', 'paypalindex')->name('paypal.index');
        Route::post('/system/paypal', 'paypalstore')->name('paypal.store');
        // Route::post('/profile', 'profileupdate')->name('profile.update');
        Route::post('password', 'passwordupdate')->name('password.update');
        //  Route::post('/pro', 'paypalstore')->name('paypal.store');
    });

    Route::controller(SocalmediaContoller::class)->group(function () {
        Route::get('/admin/setting/socalmedia', 'index')->name('admin.socalmedia.setting');
        Route::post('/admin/setting/socalupdate', 'update')->name('admin.socalmediaUpdate.setting');
        Route::delete('/admin/setting/socaldelete/{id}', 'destroy')->name('admin.socalmediaDestroy.setting');

    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/admin/user', 'index')->name('admin.user');
        Route::get('/admin/user/status/{id}', 'changeStatus')->name('admin.user.status');
        Route::delete('/admin/user/delete/{id}', 'destroy')->name('admin.user.destroy');
        // Route::delete('/admin/user/view/{id}', 'destroy')->name('admin.user.destroy');

    });

    Route::controller(BusinessVarificationController::class)->group(function () {
        Route::get('/admin/business/user', 'index')->name('admin.user.business.index');
        Route::get('/admin/business/user/{id}', 'view')->name('admin.user.business.view');
        Route::delete('/admin/business/delete/{id}', 'destroy')->name('admin.business.destroy');
    });


    Route::controller(ProfessionalVarificationController::class)->group(function () {
        Route::get('/admin/professional/user', 'index')->name('admin.user.professional.index');
        Route::get('/admin/professional/user/{id}', 'view')->name('admin.user.professional.view');
        Route::get('/admin/professional/status/{id}', 'changeStatus')->name('admin.professional.status');
    });

    //faq routes
    Route::resource('/admin/faq', FAQController::class)->names('admin.faq');
    Route::get('/admin/faq/status/{id}', [FAQController::class, 'changeStatus'])->name('admin.faq.status');

    //cms connect community routes
    Route::resource('/admin/connect-community', ConnectCommunityController::class)->names('admin.connect_community');
    Route::get('/admin/connect-community/status/{id}', [ConnectCommunityController::class, 'changeStatus'])->name('admin.connect_community.status');

    //cms heroBannerContent routes
    Route::controller(HeroBannerController::class)->group(function(){

        Route::get('/admin/hero-banner-content', 'index')->name('admin.hero_banner_content.index');
        Route::post('/admin/hero-banner-content', 'update')->name('admin.hero_banner_content.update');

    });

    //cms maximizeCommunity routes
    Route::controller(MaximizeCommunityController::class)->group(function(){

        Route::get('/admin/maximize-community', 'index')->name('admin.maximize_community.index');
        Route::post('/admin/maximize-community', 'update')->name('admin.maximize_community.update');

    });

    //cms community cloase routes
    Route::controller(CommunityCloaseController::class)->group(function(){
        
        Route::get('/admin/community-cloase', 'index')->name('admin.community_cloase.index');
        Route::post('/admin/community-cloase', 'update')->name('admin.community_cloase.update');

    });

    //cms lookingFor routes
    Route::controller(LookingForController::class)->group(function(){
        
        Route::get('/admin/looking-for', 'index')->name('admin.looking_for.index');
        Route::post('/admin/looking-for', 'update')->name('admin.looking_for.update');

    });

    //cms Featured routes
    Route::controller(FeaturedController::class)->group(function(){
        
        Route::get('/admin/featured', 'index')->name('admin.featured.index');
        Route::post('/admin/featured', 'update')->name('admin.featured.update');
        
    });

    //DynamicPageController routes
    Route::resource('/admin/dynamic-page', DynamicPageController::class)->names('admin.dynamic_page');
    Route::get('/admin/dynamic-page/status/{id}', [DynamicPageController::class, 'changeStatus'])->name('admin.dynamic_page.status');

});




require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
