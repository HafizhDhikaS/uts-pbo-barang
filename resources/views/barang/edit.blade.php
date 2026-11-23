@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <h2>Edit Barang</h2>

    <form method="POST" action="{{ route('barang.update', $barang['kode']) }}">
        @csrf
        @method('PUT')
        @include('barang._form')
    </form>
@endsection