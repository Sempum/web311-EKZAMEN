@extends('layouts.admin')

@section('title', $product->name . ' (ред.)')

@section('content')
    <h1 class="mb-3">{{ $product->name . '(ред)'}}</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Название продукта *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea rows="3" class="form-control" name="description">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label mb-3">Выберите картнику для продукта</label>
            <input class="form-control" type="file" id="image" name="image">
            <div class="my-3">
                <div class="img-block mb-2" style="width: 80px">
                    {!! $product->getImage() !!}
                </div>
                    @if ($product->image)
                    <a href="{{ route('admin.products.removeImage', $product) }}" class="btn btn-danger btn-sm">Удалить картинку</a>
                    @endif
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Выберите подкатегорию *</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="0">Выберите родительскую подкатегорию</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Изменить</button>
    </form>
@endsection
