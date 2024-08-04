@extends('layouts.admin')

@section('title', 'Новый пользователь')

@section('content')
    <h2 class="title mb-3">Новый пользователь</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Логин *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email *</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Пароль *</label>
            <input type="password" name="password" class="form-control" value="{{ old('password', "000000") }}">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        @if ($roles->count())
        <h6>Роли</h6>
        <div class="mb-3">
        @foreach ($roles as $role)
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="roles[]" type="checkbox" id="role_{{ $role->id }}" value="{{ $role->name }}">
                <label class="form-check-label" for="role_{{ $role->id }}">
                    {{ $role->name }}
                </label>
            </div>
            @endforeach
        </div>
        @endif



        <button class="btn btn-primary">Добавить пользователя</button>
    </form>
@endsection
