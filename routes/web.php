<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect('/admin'); })->name('index');

Route::get('/getVersion', [\App\Http\Controllers\GetVersionController::class, 'index']);
