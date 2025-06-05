<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\JadwalController;

Route::get('/pesan', [PesananController::class, 'viewPesan'])->name('pesan.show');
Route::post('/pesan/submit', [PesananController::class, 'storeBook'])->name('book.store'); //book lapangan

Route::get('/pesan/edit/{pesanan}', [PesananController::class, 'editView'])->name('book.edit'); //edit book lapangan
Route::put('/pesan/edit/store/{pesanan}', [PesananController::class, 'editStore'])->name('edit.store'); //edit book lapangan

Route::delete('/pesan/delete/{pesanan}', [PesananController::class, 'deleteBook'])->name('book.delete'); //delete book lapangan

Route::get('/', [PesananController::class, 'viewList'])->name('list.show');
Route::get('/list/detail', [PesananController::class, 'viewListDetail'])->name('list.show.detail');