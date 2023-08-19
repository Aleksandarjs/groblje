<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AnkaufformularController;


Route::get('/', function () {
  return view('index');
});
Route::get('/gallerie', function () {
  return view('gallerie');
});
Route::get('/faq', function () {
  return view('faq');
});
Route::get('/bestellblauf', function () {
  return view('bestellblauf');
});
Route::get('/referenzen', function () {
  return view('referenzen');
});
Route::get('/kontaktiere', function () {
  return view('kontaktiere');
});
Route::get('/grabsteine', function () {
  return view('grabsteine');
});
Route::get('/grabsteine-7', function () {
  return view('grabsteine-7');
});
Route::get('/register-login', function () {
  return view('register-login');
});
Route::get('/enstellung', function () {
  return view('enstellung');
});
Route::get('/warenkorb', function () {
  return view('warenkorb');
});


require __DIR__.'/auth.php';

Route::middleware(['auth','active','CmsLanguage'])->group(function () {

    Route::group(['prefix' => 'cms'], function () {

		Route::get('/', function () { return view('cms.index'); });

      Route::middleware('can:admins')->group(function () {
        Route::resource('admins', App\Http\Controllers\UsersController::class)->except('show');
        Route::post('admins/ajax', [App\Http\Controllers\UsersController::class, 'ajax']); 
        Route::get('language/{lang}', [App\Http\Controllers\UsersController::class, 'userlang']);
        Route::get('admins/status/{id}', [App\Http\Controllers\UsersController::class, 'status']);
      });

      Route::middleware('can:texts')->group(function () {
        Route::resource('texts', App\Http\Controllers\TextController::class)->only('index','update','edit');
        Route::post('texts/ajax', [App\Http\Controllers\TextController::class, 'ajax']); 
        Route::get('texts/imagedelete/{id}', [App\Http\Controllers\TextController::class, 'removeImage']);
      });

      Route::middleware('can:settings')->group(function () {
        Route::resource('settings', App\Http\Controllers\SettingsController::class)->only('update', 'edit');
      });

      Route::middleware('can:company')->group(function () {
        Route::resource('company', App\Http\Controllers\CompanyController::class)->only('update', 'edit');
      });
	});
});

