<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BPKAD || Login Page</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/appstyle/login.css') }}" rel="stylesheet"> {{-- Custom SCSS compile to CSS --}}
</head>

<body class="login-page">

    <div class="login-card">
        {{-- Bagian Kiri: Gambar --}}
        <div class="login-image">
            <img src="{{ asset('assets/local/gedung.jpg') }}" alt="BPKAD Kantor" />
        </div>

        {{-- Bagian Kanan: Form Login --}}
        <div class="login-form-wrapper">
            <div class="logo-section">
                <img src="{{ asset('assets/local/logosurakarta.png') }}" alt="Pemkot Surakarta" />
                <img src="{{ asset('assets/local/logobpkad.png') }}" alt="BPKAD Logo" />
            </div>

            <h2 class="welcome-text">Selamat Datang di Portal BPKAD Surakarta</h2>

            {{-- Alert jika gagal login --}}
            @if (\Illuminate\Support\Facades\Session::has('failed'))
                <div class="alert">
                    <strong>Login Gagal!</strong>
                    <p>{{ \Illuminate\Support\Facades\Session::get('failed') }}</p>
                </div>
            @endif

            <form method="POST" class="form-login">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>
        </div>
    </div>

</body>

</html>
