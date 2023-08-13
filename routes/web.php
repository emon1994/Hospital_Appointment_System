<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home',[HomeController::class, 'home'])->middleware('auth','verified')->name('home');


Route::get('/', [HomeController::class, 'index']);

Route::get('/add_doctor_view', [AdminController::class, 'addview']);

Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/show_appointment', [AdminController::class, 'show_appointment']);

Route::get('/app_cancel/{id}', [AdminController::class, 'app_cancel']);

Route::get('/app_aproved/{id}', [AdminController::class, 'app_aproved']);

Route::get('/all_doctor', [AdminController::class, 'all_doctor']);

Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);

Route::get('/update_doctor/{id}', [AdminController::class, 'update_doctor']);

Route::post('/edit_doctor/{id}', [AdminController::class, 'edit_doctor']);

Route::get('/email_view/{id}', [AdminController::class, 'email_view']);

Route::post('/send_email/{id}', [AdminController::class, 'send_email']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
