@php
    $daftarKondisi = ['Baik', 'Rusak Ringan', 'Rusak Berat'];
    $modeEdit = isset($barang);
@endphp

<label for="kode">Kode</label>
<input type="text" id="kode" name="kode"
       value="{{ old('kode', $barang['kode'] ?? '') }}"
       @if ($modeEdit) readonly @endif>
@error('kode') <div class="error">{{ $message }}</div> @enderror

<label for="nama">Nama Barang</label>
<input type="text" id="nama" name="nama" value="{{ old('nama', $barang['nama'] ?? '') }}">
@error('nama') <div class="error">{{ $message }}</div> @enderror

<label for="kategori">Kategori</label>
<input type="text" id="kategori" name="kategori" value="{{ old('kategori', $barang['kategori'] ?? '') }}">
@error('kategori') <div class="error">{{ $message }}</div> @enderror

<label for="lokasi">Lokasi</label>
<input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $barang['lokasi'] ?? '') }}">
@error('lokasi') <div class="error">{{ $message }}</div> @enderror

<label for="jumlah">Jumlah</label>
<input type="number" id="jumlah" name="jumlah" min="0" value="{{ old('jumlah', $barang['jumlah'] ?? '') }}">
@error('jumlah') <div class="error">{{ $message }}</div> @enderror

<label for="kondisi">Kondisi</label>
<select id="kondisi" name="kondisi">
    <option value="">-- Pilih kondisi --</option>
    @foreach ($daftarKondisi as $kondisi)
        <option value="{{ $kondisi }}"
            @selected(old('kondisi', $barang['kondisi'] ?? '') === $kondisi)>
            {{ $kondisi }}
        </option>
    @endforeach
</select>
@error('kondisi') <div class="error">{{ $message }}</div> @enderror

<label for="keterangan">Keterangan (opsional)</label>
<textarea id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $barang['keterangan'] ?? '') }}</textarea>
@error('keterangan') <div class="error">{{ $message }}</div> @enderror

<div style="margin-top: 16px;">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
</div>