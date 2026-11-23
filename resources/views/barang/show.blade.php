@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <h2>Detail Barang</h2>

    <table>
        <tr><th style="width: 200px;">Kode</th><td>{{ $barang['kode'] }}</td></tr>
        <tr><th>Nama Barang</th><td>{{ $barang['nama'] }}</td></tr>
        <tr><th>Kategori</th><td>{{ $barang['kategori'] }}</td></tr>
        <tr><th>Lokasi</th><td>{{ $barang['lokasi'] }}</td></tr>
        <tr><th>Jumlah</th><td>{{ $barang['jumlah'] }}</td></tr>
        <tr><th>Kondisi</th><td>{{ $barang['kondisi'] }}</td></tr>
        <tr><th>Keterangan</th><td>{{ $barang['keterangan'] ?? '-' }}</td></tr>
    </table>

    <p style="margin-top: 16px;">
        <a href="{{ route('barang.edit', $barang['kode']) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali ke daftar</a>
    </p>
@endsection