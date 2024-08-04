@extends('layouts.admin')

@section('title', 'Новая категория')

@section('content')
    <h1 class="mb-3">Новая категория</h1>

    <form action="{{ route('sector.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Название категории *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Добавить</button>
    </form>
@endsection
