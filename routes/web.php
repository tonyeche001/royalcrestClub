<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketCheckoutController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ContactController;
use App\Models\Event;

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

// Public Pages
Route::get('/', function () {
    $events = Event::where('is_published', true)
        ->where('event_date', '>=', now())
        ->orderBy('event_date')
        ->take(3)
        ->get();
    return view('home', compact('events'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



Route::get('/dashboard', function () {
    return auth()->user()->is_admin
    ? redirect()->route('admin.dashboard')
    : redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', AdminEventController::class)->except(['show']);
    Route::get('/checkin', [CheckInController::class, 'index'])->name('checkin');
    Route::post('/checkin', [CheckInController::class, 'store'])->name('checkin.store');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::post('/events/{event}/checkout', [TicketCheckoutController::class, 'checkout'])->name('tickets.checkout');
Route::get('/payment/callback', [TicketCheckoutController::class, 'callback'])->name('tickets.callback');
Route::get('/orders/{order}/confirmation', [TicketCheckoutController::class, 'confirmation'])->name('tickets.confirmation');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
