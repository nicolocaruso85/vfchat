<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\AziendeController;
use App\Http\Controllers\OrganigrammaController;
use App\Http\Controllers\StatisticheController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    // Main Page Route
    Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

    // aziende
    Route::get('/aziende', [AziendeController::class, 'aziende'])->name('aziende');
    Route::get('/azienda/{id}', [AziendeController::class, 'azienda'])->name('azienda');

    // organigramma
    Route::get('/organigramma', [OrganigrammaController::class, 'organigramma'])->name('organigramma');

    // utenti
    Route::get('/utenti', [UserController::class, 'utenti'])->name('utenti');
    Route::get('/utente/{id}', [UserController::class, 'utente'])->name('utente');
    Route::get('/ruoli', [UserController::class, 'ruoli'])->name('ruoli');
    Route::get('/permessi', [UserController::class, 'permessi'])->name('permessi');

    // statistiche
    Route::get('/utenti-collegati', [StatisticheController::class, 'utentiCollegati'])->name('utenti-collegati');
    Route::get('/punteggio-utenti', [StatisticheController::class, 'punteggioUtenti'])->name('punteggio-utenti');
    Route::get('/punteggio-per-store', [StatisticheController::class, 'punteggioPerStore'])->name('punteggio-per-store');
    Route::get('/report-messaggi-inviati', [StatisticheController::class, 'reportMessaggiInviati'])->name('report-messaggi-inviati');
    Route::get('/report-con-classifica', [StatisticheController::class, 'reportConClassifica'])->name('report-con-classifica');
    Route::get('/report-generale', [StatisticheController::class, 'reportGenerale'])->name('report-generale');
});

// authentication
Route::get('/login', [LoginBasic::class, 'index'])->name('login');
Route::post('/login', [LoginBasic::class, 'customerLogin'])->name('login');
Route::get('/register', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/forgot-password', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
Route::post('logout', [LoginBasic::class, 'customerLogout'])->name('logout');
