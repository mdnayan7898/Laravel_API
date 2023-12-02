<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestingMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RequestController;


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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
Route::get('/show-email', [MailController::class, 'showMail'])->name('show.email');
Route::get('/request-show', [RequestController::class, 'index'])->name('index.request');
Route::get('/show-chche', [RequestController::class, 'checkCache'])->name('index.request');

