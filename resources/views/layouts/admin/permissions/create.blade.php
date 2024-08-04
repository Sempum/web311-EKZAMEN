@extends('layouts.admin')

@section('title', 'Новое разрешение')

@section('content')
    <h2 class="title mb-3">Новое разрешение</h2>

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Название разрешения *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Добавить разрешение</button>
    </form>
@endsection
