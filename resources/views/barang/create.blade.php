@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <h2>Tambah Barang</h2>

    <form method="POST" action="{{ route('barang.store') }}">
        @csrf
        @include('barang._form')
    </form>
@endsection