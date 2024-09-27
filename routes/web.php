<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketResponseController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard1', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard1');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    // 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //
    Route::resource('tickets', TicketController::class);

    Route::patch('/tickets/{ticket}/reopen', [TicketController::class, 'close'])->name('tickets.reopen')->middleware('admin');
    Route::patch('/tickets/{ticket}/close', [TicketController::class, 'reopen'])->name('tickets.close')->middleware('admin');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy')->middleware('admin');
    Route::post('/tickets/{ticket}/responses', [TicketResponseController::class, 'store'])->name('responses.store');
});


require __DIR__ . '/auth.php';
