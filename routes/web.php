<?php

use App\Http\Controllers\Auth\LoginWithGitLabController;
use App\Http\Controllers\Auth\RedirectToGitLabController;
use App\Http\Controllers\Auth\ShowLoginController;
use App\Http\Controllers\ShowGroupsController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', ShowLoginController::class)->name('login');
    Route::get('/login/gitlab', RedirectToGitLabController::class)->name('login.gitlab.redirect');
    Route::get('/login/gitlab/callback', LoginWithGitLabController::class)->name('login.gitlab.callback');
});

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', '/groups');
    Route::get('/groups', ShowGroupsController::class)->name('groups');
});
