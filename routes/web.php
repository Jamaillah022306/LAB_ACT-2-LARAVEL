<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', [RegistrationController::class, 'home'])->name('home');

Route::get('/register', [RegistrationController::class, 'showForm'])->name('register.form');

Route::post('/register', [RegistrationController::class, 'submitForm'])->name('register.submit');

Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations');

Route::put('/registrations/{id}', [RegistrationController::class, 'update'])->name('registrations.update');

Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');