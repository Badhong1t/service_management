<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Frontend\PageController;
use App\Http\Controllers\Web\Frontend\ReviewController;
use App\Http\Controllers\Web\Frontend\CommunityController;
use App\Http\Controllers\Web\Frontend\LoginSecurityController;
use App\Http\Controllers\Web\Frontend\Auth\RegisteredController;
use App\Http\Controllers\Web\Frontend\ProfessionalInfoController;
use App\Http\Controllers\Web\Frontend\UpdatePersonalInfoController;
use App\Http\Controllers\Web\Frontend\PersonalInformationController;



Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/login', 'login')->name('login');
    Route::get('/signUp', 'signUp')->name('signUp');
    Route::get('/signUp-with-code', 'signUpWithCode')->name('signUpWithCode');
    Route::get('/verify-email', 'verifyEmail')->name('verifyEmail');
    Route::get('/forgot-password', 'forgotPassword')->name('forgotPassword');
    Route::get('/select-type', 'selectType')->name('selectType');
    Route::get('/profile-information', 'profileInformation')->name('profileInformation');
    Route::get('/professional-personal-info', 'professionalPersonalInfo')->name('professionalPersonalInfo');
    Route::get('/user-homepage', 'userHomePage')->name('userHomePage');
    Route::get('/details-page/{id}', 'detailsPage')->name('detailsPage');
    Route::get('/community-join', 'communityJoin')->name('communityJoin');
    Route::get('/community-inbox', 'communityInbox')->name('communityInbox');
    Route::get('/account', 'account')->name('account');
    Route::get('/update-personal-information', 'updatePersonalInformation')->name('updatePersonalInformation');
    Route::get('/login-and-security', 'loginAndSecurity')->name('loginAndSecurity');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/personal-information', 'personalInformation')->name('personalInformation');
    Route::get('/business-information', 'businessInformation')->name('businessInformation');
    Route::get('/business-photo', 'businessPhoto')->name('businessPhoto');
    Route::get('/business-description', 'businessDescription')->name('businessDescription');
    Route::get('/operating-hours', 'operatingHours')->name('operatingHours');
    Route::get('/submit-verification', 'submitVerification')->name('submitVerification');
});

//ReviewController Routes
Route::post('/user-review/{id}', [ReviewController::class, 'store'])->name('user.review.store');

//CommunityController Routes
Route::post('/community-message', [CommunityController::class, 'store'])->name('community.message.store');

//PersonalInformationController Routes
Route::post('/about-user', [PersonalInformationController::class, 'store'])->name('about.user.store');
Route::post('/image-upload', [PersonalInformationController::class, 'imageUpload'])->name('image.upload.store');

//UpdatePersonalInfoController Routes
Route::post('/update-personal-info', [UpdatePersonalInfoController::class,'store'])->name('updatePersonalInfo.store');

//LoginSecurityController Routes
Route::post('/login-security', [LoginSecurityController::class, 'store'])->name('loginSecurity.store');

//ProfessionalInfoController Routes
Route::post('/professional-info', [ProfessionalInfoController::class, 'aboutUserUpdate'])->name('professionalInfo.store');
Route::post('/operating-hours-store', [ProfessionalInfoController::class, 'operatingHoursUpdate'])->name('operatingHours.update');
Route::post('/professional-image-upload', [ProfessionalInfoController::class, 'imageUpload'])->name('professionalImage.upload.store');

//Registered Controller Routes
Route::controller(RegisteredController::class)->group(function () {
    Route::post('/send-otp', 'sendOtp')->name('sendOtp');
    Route::post('/verify-otp', 'verifyOtp')->name('verifyOtp');
    Route::post('/select-type', 'selectType')->name('selectType');
    Route::post('/profile-information', 'profileInformation')->name('profileInformation');
    Route::post('/business-information', 'businessInformation')->name('post.businessInformation');
    Route::post('/operating-hours', 'operatingHours')->name('operatingHours.store');
    Route::post('/business-description', 'businessDescription')->name('businessDescription');
    Route::post('/business-photo', 'businessPhoto')->name('businessPhoto');
    Route::post('/submit-verification', 'submitVerification')->name('submitVerification');

});