<?php

use App\Http\Controllers\backendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
Route::get('language', function () {
    app()->setLocale(request()->get('lang'));
    session()->put('locale', request()->get('lang'));
    return redirect()->back();
})->name('language');
$locale = session()->get('locale', 'en');
Route::match(["POST", "GET"], '/', [HomeController::class, 'home'])
    ->name('home');
Route::match(["POST", "GET"], '/rubrique', [HomeController::class, 'rubrique'])
    ->name('candidatrubrique');
Route::match(["POST", "GET"], '/voting', [HomeController::class, 'voting'])
    ->name('voting');
Route::match(["POST", "GET"], '/callback', [HomeController::class, 'callback'])
    ->name('callback');
Route::match(["POST", "GET"], '/success', [HomeController::class, 'success'])
    ->name('success');
Route::match(["POST", "GET"], '/cancel', [HomeController::class, 'cancel'])
    ->name('cancel');
Route::group(['prefix' => 'admin'],function () {
    Route::match(["POST", "GET"], '/dashboard', [backendController::class, 'dashboard'])
        ->name('dashboard');
    Route::match(["POST", "GET"], '/candidat', [backendController::class, 'candidat'])
        ->name('candidat');
    Route::match(["POST", "GET"], '/edition', [backendController::class, 'edition'])
        ->name('edition');
    Route::match(["POST", "GET"], '/rubrique', [backendController::class, 'rubrique'])
        ->name('rubrique');
    Route::match(["POST", "GET"], '/edit-candidat/{id}', [backendController::class, 'candidat_edit'])
        ->name('candidat_edit');
    Route::match(["POST", "GET"], '/candidat-delete/{id}', [backendController::class, 'candidat_delete'])
        ->name('candidat_delete');
    Route::match(["POST", "GET"], '/vote', [backendController::class, 'vote'])
        ->name('vote');
});
