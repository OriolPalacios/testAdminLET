<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('testing_admintlte');
});

Route::resource('tickets', TicketController::class);

// Route::get('/graficos', function () {
//     return view('graficos');
// });

Route::get('/reporte', TicketController::class . '@reporte');