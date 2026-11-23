<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inventaris Barang')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f9; color: #222; }
        header { background: #0b3d91; color: #fff; padding: 16px 32px; }
        header h1 { margin: 0; font-size: 22px; }
        nav { background: #e9eef7; padding: 10px 32px; }
        nav a { margin-right: 16px; color: #0b3d91; text-decoration: none; font-weight: bold; }
        main { max-width: 960px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 6px; }
        footer { text-align: center; padding: 16px; color: #666; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #e9eef7; }
        .btn { display: inline-block; padding: 6px 12px; border: 0; border-radius: 4px;
               color: #fff; text-decoration: none; cursor: pointer; font-size: 14px; }
        .btn-primary { background: #0b3d91; }
        .btn-info { background: #138496; }
        .btn-warning { background: #d68910; }
        .btn-danger { background: #c0392b; }
        .btn-secondary { background: #6c757d; }
        .alert { padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .alert-success { background: #d4edda; color: #155724; }
        .alert-danger { background: #f8d7da; color: #721c24; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        .error { color: #c0392b; font-size: 13px; }
        form.inline { display: inline; }
    </style>
</head>
<body>
    {{-- Area judul --}}
    <header>
        <h1>Sistem Inventaris Barang</h1>
    </header>

    {{-- Area navigasi --}}
    <nav>
        <a href="{{ route('barang.index') }}">Daftar Barang</a>
        <a href="{{ route('barang.create') }}">Tambah Barang</a>
    </nav>

    {{-- Area konten --}}
    <main>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">Data belum bisa disimpan. Periksa kembali isian di bawah.</div>
        @endif

        @yield('content')
    </main>

    {{-- Area footer --}}
    <footer>
        UTS Pemrograman Berorientasi Objek &middot; Universitas Catur Insan Cendekia
    </footer>
</body>
</html>