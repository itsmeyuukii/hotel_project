<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;
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

route::get('/', [AdminController::class,'home']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

route::get('/home', [AdminController::class,'index'])->name('home');

route::get('/create-room', [AdminController::class,'create_room']);

route::post('/add-room', [AdminController::class,'add_room']);

route::get('/view-room',[AdminController::class,'view_room']);

route::get('/room-delete/{id}', [AdminController::class, 'delete_room']);

route::get('/room-update/{id}', [AdminController::class, 'update_room']);

route::post('/edit-room/{id}', [AdminController::class, 'edit_room']);

route::get('/room-details/{id}', [HomeController::class, 'room_details']);

route::post('/add-booking/{id}',[HomeController::class, 'add_booking']);
