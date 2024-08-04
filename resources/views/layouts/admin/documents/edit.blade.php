@extends('layouts.admin')

@section('title', $document->name . ' (ред.)')

@section('content')
    <h1 class="mb-3">{{ $document->name . '(ред)'}}</h1>

    <form action="{{ route('documents.update', $document) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Название документации *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $document->name) }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea rows="3" class="form-control" name="description" aria-label="With textarea">{{ old('description', $document->description) }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="file" class="form-label">Загрузите сам файл</label>
            <input class="form-control" type="file" id="file">
        </div>

        <button class="btn btn-primary">Изменить</button>
    </form>
@endsection
