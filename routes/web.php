<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ShowMembersController;
use App\Http\Controllers\ShowNamespacesController;
use App\Http\Controllers\ShowNameSpaceMembers;

use App\Http\Controllers\Auth\ShowLoginController;
use App\Http\Controllers\Auth\LoginWithGitLabController;
use App\Http\Controllers\Auth\RedirectToGitLabController;

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
    Route::get('/login/gitlab/callback', LoginWithGitLabController::class)
         ->name('login.gitlab.callback');
});

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', '/namespaces');

    Route::post('/logout', LogoutController::class)->name('logout');

    Route::get('/namespaces', ShowNamespacesController::class)->name('namespaces');
    Route::get('/namespaces/{namespace}', ShowNameSpaceMembers::class)->name('namespace.projects');

    Route::get('/members', ShowMembersController::class)->name('members');

    Route::get('/test', function () {
        /** @var \App\User $user */
        $user = auth()->user();

        return $user->projects(true);

        //return $user->projectMembers(8995480);
        //return $user->subgroups(5642293);
        //return $user->namespaces();
    });
});
