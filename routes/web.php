<?php

use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {
    $data['title'] = 'Login';
    $data['user'] = Session::get('provider_id');
    if (!$data['user']) {
        return view('pages/login', compact('data'));
    } else {
        return redirect('/home');
    }
});

Route::get('/login/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('/login/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

Route::get('/home', [TaskController::class, 'index'])->name('home');
Route::post('/task/store', [TaskController::class, 'store'])->name('url.store');
Route::get('/task/{id}', [TaskController::class, 'getById'])->name('url.getById');
Route::put('/task', [TaskController::class, 'update'])->name('url.update');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('url.destroy');
Route::get('/logout/{id}', [SocialAuthController::class, 'logout'])->name('auth.logout');
