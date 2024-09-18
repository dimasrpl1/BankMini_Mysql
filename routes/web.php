<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NasabahController;

Route::get('/', function () {
    return redirect()->route('nasabah.index'); // Redirect ke halaman index nasabah
});

Route::resource('nasabah', NasabahController::class);
