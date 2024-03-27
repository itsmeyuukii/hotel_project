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

route::get('/create-room', [AdminController::class,'create_room']); //to go in form

route::post('/add-room', [AdminController::class,'add_room']); // get the form post method and save

route::get('/view-room',[AdminController::class,'view_room']);// to go in view room

route::get('/room-delete/{id}', [AdminController::class, 'delete_room']);

route::get('/room-update/{id}', [AdminController::class, 'update_room']); // to get and update

route::post('/edit-room/{id}', [AdminController::class, 'edit_room']); //to transfer data

route::get('/room-details/{id}', [HomeController::class, 'room_details']);

route::post('/add-booking/{id}',[HomeController::class, 'add_booking']);

route::get('/bookings', [AdminController::class, 'bookings']);

route::get('/delete-booking/{id}', [AdminController::class, 'delete_booking']); // to get the id and delete the booking

route::get('/approve-book/{id}',[AdminController::class, 'approve_book']);

route::get('/reject-book/{id}',[AdminController::class, 'reject_book']);

route::get('/view-gallery',[AdminController::class, 'view_gallery']);

route::post('/upload-gallery',[AdminController::class, 'upload_gallery']); // to upload images in gallery DB

route::get('/delete-gallery/{id}',[AdminController::class, 'delete_gallery']);

route::post('/contact', [HomeController::class, 'contact']);

route::get('/all-messages', [AdminController::class, 'all_messages']);

route::get('/send-email/{id}', [AdminController::class, 'send_email']);
