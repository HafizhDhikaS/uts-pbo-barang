# UTS PBO - Inventaris Barang (Laravel 13)

Aplikasi CRUD sederhana untuk mengelola data barang inventaris.
Data disimpan di session Laravel (SESSION_DRIVER=file), tanpa database.
jadi akan hilang bila session berakhir atau cookie dihapus karena tersimpan di browser

Nama: Hafizh Dhika Syahputra | NIM: 20251020057 | Mata kuliah: Pemrograman Berorientasi Objek

## Fitur
- Daftar barang
- Tambah barang
- Detail barang
- Edit barang
- Hapus barang (dengan konfirmasi)
- Pesan status sukses/gagal

## Cara menjalankan
1. Clone repository, lalu masuk ke foldernya:
   ```
   git clone https://github.com/HafizhDhikaS/uts-pbo-barang.git
   cd uts-pbo-barang
   ```
2. Pasang dependensi: `composer install`
3. Salin konfigurasi: `cp .env.example .env` (Windows: `copy .env.example .env`)
4. Buat app key: `php artisan key:generate`
5. Pastikan di `.env`: `SESSION_DRIVER=file`
6. Pastikan folder `storage` dan `bootstrap/cache` bisa ditulisi
7. Jalankan: `php artisan serve`
8. Buka http://127.0.0.1:8000/barang

## Daftar route
| Method | URI | Nama route | Aksi |
|---|---|---|---|
| GET | /barang | barang.index | index |
| GET | /barang/create | barang.create | create |
| POST | /barang | barang.store | store |
| GET | /barang/{kode} | barang.show | show |
| GET | /barang/{kode}/edit | barang.edit | edit |
| PUT/PATCH | /barang/{kode} | barang.update | update |
| DELETE | /barang/{kode} | barang.destroy | destroy |

## Struktur utama
- `routes/web.php`: definisi route
- `app/Http/Controllers/BarangController.php`: logika alur request
- `resources/views/layouts/app.blade.php`: layout utama
- `resources/views/barang/`: halaman index, create, show, edit, dan `_form`

