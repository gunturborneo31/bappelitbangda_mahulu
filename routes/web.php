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

// Redirect root to admin panel
Route::get('/', function () {
    return redirect('/site-admin');
});

// Language Switcher Route
Route::get('language/{locale}', function ($locale) {
    // Set locale and save to session
    app()->setLocale($locale);
    session()->put('locale', $locale);
    // Jika menggunakan package bezhansalleh, biasanya via cookie:
    cookie()->queue(cookie()->forever('filament_language_switch_locale', $locale));
    
    return redirect()->back();
})->name('language.switch');
