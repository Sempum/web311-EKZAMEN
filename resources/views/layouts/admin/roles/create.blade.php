@extends('layouts.admin')

@section('title', 'Новая роль')

@section('content')
    <h1 class="mb-3">Новая роль</h1>

    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Название роли *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Добавить</button>
    </form>
@endsection
