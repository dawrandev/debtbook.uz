<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\middleware\Authenticate;
use App\Http\middleware\Admin;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'welcome')->name('welcome');
    Route::post('/login', 'loginStore')->name('loginStore');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'clientsPage')->name('clientsPage');
    Route::post('/addclient', 'addclient')->name('addclient');
    Route::post('/searchClient', 'searchClient')->name('searchClient');
})->middleware('auth');

Route::controller(DebtController::class)->group(function () {
    Route::get('/single/{id}', 'single')->name('single');
    Route::post('/adddebt', 'adddebt')->name('adddebt');
    Route::get('/subtdebtPage/{client_id}', 'subtdebtPage')->name('subtdebtPage');
    Route::post('/subtdebt', 'subtdebt')->name('subtdebt');
})->middleware('auth');

Route::controller(HistoryController::class)->group(function () {
    Route::get('/history', 'history')->name('history');
})->middleware('auth');

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'profile')->name('profile')->middleware('auth');
    Route::post('/editprofile', 'editprofile')->name('editprofile');
    Route::post('/image', 'image')->name('image');
})->middleware(['auth', 'admin']);

Route::controller(AdminController::class)->group(function () {
    Route::get('/adminPage', 'adminPage')->name('adminPage');
    Route::post('/updateUser', 'updateUser')->name('updateUser');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::post('/searchUser', 'searchUser')->name('searchUser');
    Route::post('/deleteUser', 'deleteUser')->name('deleteUser');
})->middleware(['auth', 'admin']);
