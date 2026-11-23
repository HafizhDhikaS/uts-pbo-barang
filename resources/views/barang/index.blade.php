@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <h2>Daftar Barang</h2>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Barang</a>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($daftarBarang) === 0)
                <tr>
                    <td colspan="7">Belum ada data barang. Silakan tambah data baru.</td>
                </tr>
            @else
                @foreach ($daftarBarang as $barang)
                    <tr>
                        <td>{{ $barang['kode'] }}</td>
                        <td>{{ $barang['nama'] }}</td>
                        <td>{{ $barang['kategori'] }}</td>
                        <td>{{ $barang['lokasi'] }}</td>
                        <td>{{ $barang['jumlah'] }}</td>
                        <td>{{ $barang['kondisi'] }}</td>
                        <td>
                            <a href="{{ route('barang.show', $barang['kode']) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('barang.edit', $barang['kode']) }}" class="btn btn-warning">Edit</a>

                            <form class="inline" method="POST"
                                  action="{{ route('barang.destroy', $barang['kode']) }}"
                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection