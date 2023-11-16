<?php

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
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login.index');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.login');
Route::get('/regsiter', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashBoardController::class, 'index'])->name('dashboard.index');

Route::get('/rooms', [\App\Http\Controllers\RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/add', [\App\Http\Controllers\RoomController::class, 'add'])->name('rooms.add');
Route::post('/rooms/save', [\App\Http\Controllers\RoomController::class, 'save'])->name('rooms.save');
Route::put('/rooms/{id}', [\App\Http\Controllers\RoomController::class, 'update'])->name('rooms.update');
Route::get('/rooms/delete/{id}', [\App\Http\Controllers\RoomController::class, 'delete'])->name('rooms.delete');


Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/add', [\App\Http\Controllers\CustomerController::class, 'add'])->name('customers.add');
Route::post('/customers/save', [\App\Http\Controllers\CustomerController::class, 'save'])->name('customers.save');
Route::put('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
Route::get('/customers/delete/{id}', [\App\Http\Controllers\CustomerController::class, 'delete'])->name('customers.delete');


Route::get('/equipment', [\App\Http\Controllers\EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/equipment/add', [\App\Http\Controllers\EquipmentController::class, 'add'])->name('equipment.add');
Route::post('/equipment/save', [\App\Http\Controllers\EquipmentController::class, 'save'])->name('equipment.save');
Route::put('/equipment/{id}', [\App\Http\Controllers\EquipmentController::class, 'update'])->name('equipment.update');
Route::get('/equipment/delete/{id}', [\App\Http\Controllers\EquipmentController::class, 'delete'])->name('equipment.delete');


Route::get('/bookings', [\App\Http\Controllers\BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/add', [\App\Http\Controllers\BookingController::class, 'add'])->name('bookings.add');
Route::post('/bookings/save', [\App\Http\Controllers\BookingController::class, 'save'])->name('bookings.save');
Route::put('/bookings/{id}', [\App\Http\Controllers\BookingController::class, 'update'])->name('bookings.update');
Route::get('/bookings/delete/{id}', [\App\Http\Controllers\BookingController::class, 'delete'])->name('bookings.delete');
