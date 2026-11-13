<?php

use App\Http\Controllers\KhachHangController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/khach-hang');

Route::resource('khach-hang', KhachHangController::class);