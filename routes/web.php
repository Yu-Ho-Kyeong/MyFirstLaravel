<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test.index');
Route::get('/test', [TestController::class, 'index'])->name('tests.index');

// Route::get('{any}', function () {
//     return view('app');
// })->where('any', '.*');
