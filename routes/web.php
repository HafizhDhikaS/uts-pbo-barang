<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

// Halaman awal diarahkan ke daftar barang (bukan closure berisi logika)
Route::redirect('/', '/barang');

// ---------- Route manajemen data Barang (7 route wajib) ----------

// 1. Daftar barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');

// 2. Form tambah (statis, HARUS sebelum /barang/{kode})
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');

// 3. Simpan data baru
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

// 4. Detail satu barang (dinamis)
Route::get('/barang/{kode}', [BarangController::class, 'show'])->name('barang.show');

// 5. Form edit
Route::get('/barang/{kode}/edit', [BarangController::class, 'edit'])->name('barang.edit');

// 6. Perbarui data (PUT/PATCH)
Route::match(['put', 'patch'], '/barang/{kode}', [BarangController::class, 'update'])->name('barang.update');

// 7. Hapus data
Route::delete('/barang/{kode}', [BarangController::class, 'destroy'])->name('barang.destroy');