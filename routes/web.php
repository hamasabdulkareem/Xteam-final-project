<?php

use App\Http\Controllers\Front\FrontHomeControl;
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

Route::get('/',[FrontHomeControl::class, 'index'])->name('front.home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::middleware(
        'admin.auth:web'
        )->group(function(){
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
        });
});
