@extends('layouts.admin')

@section('title', 'Новая подкатегория')

@section('content')
    <h1 class="mb-3">Новая подкатегория</h1>

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Название категории *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="sector_id">Выберите категорию *</label>
            <select name="sector_id" id="sector_id" class="form-select">
                <option value="0" selected disabled>Выберите родительскую категорию</option>
                @foreach ($sectors as $sector)
                <option value="{{ $sector->id }}" @if ($sector->id == old('sector_id')) selected @endif>
                    {{ $sector->name }}
                </option>
                @endforeach
            </select>
            @error('sector_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="icon" class="form-label mb-3">Выберите картнику для продукта</label>
            <input class="form-control" type="file" id="icon" name="icon">
        </div>

        <button class="btn btn-primary">Добавить</button>
    </form>
@endsection
