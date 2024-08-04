@extends('layouts.admin')

@section('title', 'Новая Документация')

@section('content')
    <h1 class="mb-3">Новая Документация</h1>

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Название документации *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" aria-label="With textarea">
                {{ old('description') }}
            </textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="document" class="form-label">Загрузите сам файл</label>
            <input class="form-control" type="file" name="document">
        </div>

        <div class="form-group mb-3">
            <label for="product_id">Выберите товар *</label>
            <select name="product_id" id="product_id" class="form-select">
                <option value="0" selected disabled>Выберите товар к которому принадлежит документ</option>
                @foreach ($products as $prod)
                <option value="{{ $prod->id }}" @if ($prod->id == old('product_id')) selected @endif>
                    {{ $prod->name }}
                </option>
                @endforeach
            </select>
            @error('product_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Добавить</button>
    </form>
@endsection
