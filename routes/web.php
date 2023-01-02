<?php

use Fowitech\Sms\Sms;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\MainController::class,'index'])
    ->middleware('auth')
    ->name('index');

Route::group(['middleware' => 'auth'],function (){
    Route::get('account/profile',[App\Http\Controllers\Account\ProfileController::class,'index'])
        ->name('account.profile');
});

Route::group(['middleware' => 'auth'],function (){
    Route::get('hotspot-template-login/{hotspot}',[\App\Http\Controllers\Hotspot\Template\HotspotTemplateController::class,'downloadLoginHtml'])
        ->name('hotspot-template-login');

    Route::resource('hotspot',\App\Http\Controllers\Hotspot\HotspotController::class);
    Route::resource('hotspot-account', \App\Http\Controllers\Hotspot\Account\HotspotAccountController::class);


    Route::resource('router',\App\Http\Controllers\Router\RouterController::class);
});

Route::group(['prefix' => 'hotspot-login','as' => 'hotspot-login.'],function(){

    Route::get('{hotspot}',[\App\Http\Controllers\Hotspot\HotspotController::class,'loginRedirect']);
    Route::post('{hotspot}',[\App\Http\Controllers\Hotspot\HotspotController::class,'login'])
       ->name('index');

    //region Identity Checker
    Route::post('{hotspot}/check/identity',[\App\Http\Controllers\Hotspot\Checker\HotspotIdentityController::class,'check'])
       ->name('check.identity');
    //endregion

    //region SMS Checker
    Route::post('{hotspot}/send-sms',[\App\Http\Controllers\Hotspot\Checker\HotspotSMSController::class,'send'])
        ->name('send-sms');
    Route::post('{hotspot}/check/sms',[\App\Http\Controllers\Hotspot\Checker\HotspotSMSController::class,'check'])
       ->name('check.sms');
    //endregion

    //region Test Result
    Route::match(['POST','GET'],'{hotspot}/test-result',[\App\Http\Controllers\Hotspot\HotspotController::class,'testResult'])
        ->name('test-result');
    //endregion
});


Route::get('/test',function(){

    dd(route('login'));
});

