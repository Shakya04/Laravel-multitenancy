<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

$centralDomains = config('tenancy.central_domains');

Route::middleware(['web'])->group(function () use ($centralDomains) {
    foreach ($centralDomains as $domain) {
        Route::domain($domain)->group(function () {
            // Define your web routes here
            Route::get('/', function () {
                return view('welcome');
            });

            Route::get('/dashboard', function () {
                return view('dashboard');
            })->middleware(['auth', 'verified'])->name('dashboard');
        });
    }
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('tenants', TenantController::class);
});

require __DIR__.'/auth.php';
