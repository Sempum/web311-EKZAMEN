@extends('layouts.admin')

@section('title', 'Новый продукт')

@section('content')
    <h1 class="mb-3">Новый продукт</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Название продукта *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" aria-label="With textarea" rows="3">
                {{ old('description') }}
            </textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Выберите картнику для продукта</label>
            <input class="form-control" type="file" name="image">
          </div>

        <div class="form-group mb-3">
            <label for="category_id">Выберите подкатегорию *</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="0" selected disabled>Выберите родительскую подкатегорию</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Добавить</button>
    </form>
@endsection
