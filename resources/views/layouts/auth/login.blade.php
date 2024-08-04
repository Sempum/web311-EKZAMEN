@extends('layouts.app')

@section('title', 'Вход в аккаунт')

@section('content')
<div class="container my-3 auth">
    <h1 class="mb-3">Вход в аккаунт</h1>
    <!-- if user is banned view alert-error -->
    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif
    <!-- if user is banned view alert-error -->

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf <!-- csrf token -->
        <div class="form-group mb-3">
            <label for="email">Email *</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Пароль *</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Войти</button>
    </form>
</div>
@endsection
