<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ShowController;

//Route::resource('/id={userID}/tickets', TicketController::class)
//     ->name('index', 'home');
// Route::get('/id={userID}/tickets/{ticket}', [TicketController::class, 'show'])->name('show');


Route::get('/id={userID}/tickets', [TicketController::class, 'index'])->name('home');
Route::post('/id={userID}/tickets', [TicketController::class, 'store'])->name('store');
Route::get('/id={userID}/tickets/create', [TicketController::class, 'create'])->name('create');
Route::put('/id={userID}/tickets/{ticket}', [TicketController::class, 'update'])->name('update');
Route::get('/id={userID}/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('edit');
Route::get('/id={userID}/tickets/search', [TicketController::class, 'filter'])->name('filter');

Route::get('/id={userID}/tickets/{ticket}', [ShowController::class, 'show'])->name('show');
