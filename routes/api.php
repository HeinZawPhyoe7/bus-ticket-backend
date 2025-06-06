<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Ticket Api
Route::post('create-ticket', [TicketController::class, 'store'])->name('store');
Route::get('ticket-all', [TicketController::class, 'index'])->name('index');
Route::post('search-ticket', [TicketController::class, 'search'])->name('search');
Route::get('show-ticket-details/{id}', [TicketController::class, 'show'])->name('show_ticket_details');

//User Api
Route::post('create-user', [UserController::class, 'store'])->name('store');
Route::get('show-user-details/{id}', [UserController::class, 'show'])->name('show_user_details');
