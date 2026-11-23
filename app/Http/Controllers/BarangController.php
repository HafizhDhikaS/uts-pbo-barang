<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Nama key tempat seluruh data barang disimpan di session.
     * Data berbentuk array: ['KODE' => [field => nilai, ...], ...]
     */
    private const SESSION_KEY = 'daftar_barang';

    /** Pilihan kondisi barang (dipakai untuk validasi) */
    private const DAFTAR_KONDISI = ['Baik', 'Rusak Ringan', 'Rusak Berat'];

    // Method bantu (private = tidak bisa diakses dari luar class)

    /** Ambil semua barang dari session; kosong bila belum ada. */
    private function ambilSemua(): array
    {
        return session(self::SESSION_KEY, []);
    }

    /** Simpan seluruh barang ke session. */
    private function simpanSemua(array $semuaBarang): void
    {
        session([self::SESSION_KEY => $semuaBarang]);
    }

    /** Aturan validasi untuk field selain kode. */
    private function aturanField(): array
    {
        return [
            'nama'       => 'required|string|max:100',
            'kategori'   => 'required|string|max:50',
            'lokasi'     => 'required|string|max:100',
            'jumlah'     => 'required|integer|min:0',
            'kondisi'    => 'required|in:' . implode(',', self::DAFTAR_KONDISI),
            'keterangan' => 'nullable|string|max:255',
        ];
    }

    /** Respons standar bila kode barang tidak ditemukan. */
    private function kodeTidakDitemukan(string $kode)
    {
        return redirect()
            ->route('barang.index')
            ->with('error', "Barang dengan kode {$kode} tidak ditemukan.");
    }

    // 7 method 

    /** index(): ambil data dari session, kirim ke halaman daftar. */
    public function index()
    {
        $daftarBarang = $this->ambilSemua();

        return view('barang.index', compact('daftarBarang'));
    }

    /** create(): tampilkan form tambah barang. */
    public function create()
    {
        return view('barang.create');
    }

    /** store(): terima input, bentuk data, simpan ke session, redirect. */
    public function store(Request $request)
    {
        $data = $request->validate(array_merge($this->aturanField(), [
            'kode' => ['required', 'string', 'max:20', 'regex:/^[A-Za-z0-9\-]+$/'],
        ]));

        $semuaBarang = $this->ambilSemua();

        // Kode adalah key unik: tolak bila sudah dipakai
        if (isset($semuaBarang[$data['kode']])) {
            return back()
                ->withInput()
                ->withErrors(['kode' => 'Kode sudah dipakai barang lain.']);
        }

        $semuaBarang[$data['kode']] = $data;   // bentuk data barang baru
        $this->simpanSemua($semuaBarang);      // simpan ke session

        return redirect()
            ->route('barang.index')
            ->with('status', 'Barang berhasil ditambahkan.');
    }

    /** show($kode): tampilkan detail satu barang. */
    public function show(string $kode)
    {
        $barang = $this->ambilSemua()[$kode] ?? null;

        if ($barang === null) {
            return $this->kodeTidakDitemukan($kode);
        }

        return view('barang.show', compact('barang'));
    }

    /** edit($kode): tampilkan form edit dengan data lama. */
    public function edit(string $kode)
    {
        $barang = $this->ambilSemua()[$kode] ?? null;

        if ($barang === null) {
            return $this->kodeTidakDitemukan($kode);
        }

        return view('barang.edit', compact('barang'));
    }

    /** update($kode): perbarui data di session berdasarkan kode. */
    public function update(Request $request, string $kode)
    {
        $semuaBarang = $this->ambilSemua();

        if (! isset($semuaBarang[$kode])) {
            return $this->kodeTidakDitemukan($kode);
        }

        $data = $request->validate($this->aturanField());

        // Kode tidak berubah; field lain ditimpa dengan input baru
        $semuaBarang[$kode] = array_merge($semuaBarang[$kode], $data);
        $this->simpanSemua($semuaBarang);

        return redirect()
            ->route('barang.index')
            ->with('status', 'Barang berhasil diperbarui.');
    }

    /** destroy($kode): hapus barang dari session berdasarkan kode. */
    public function destroy(string $kode)
    {
        $semuaBarang = $this->ambilSemua();

        if (! isset($semuaBarang[$kode])) {
            return $this->kodeTidakDitemukan($kode);
        }

        unset($semuaBarang[$kode]);
        $this->simpanSemua($semuaBarang);

        return redirect()
            ->route('barang.index')
            ->with('status', 'Barang berhasil dihapus.');
    }
}