@extends('layouts.admin')

@section('title', $permission->name . ' (ред)')

@section('content')
    <h2 class="title mb-3">{{ $permission->name . ' (ред)' }}</h2>

    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Название разрешения *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $permission->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Изменить</button>
    </form>
@endsection
