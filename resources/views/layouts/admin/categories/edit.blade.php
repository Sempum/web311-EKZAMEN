@extends('layouts.admin')

@section('title', $category->name . ' (ред.)')

@section('content')
    <h1 class="mb-3">{{ $category->name . ' (ред.)' }}</h1>

    <form action="{{ route('category.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Название подкатегории *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
        </div>

        <div class="form-group mb-3">
            <label for="sector_id">Выберите категорию *</label>
            <select name="sector_id" id="sector_id" class="form-select">
                <option value="0">Выберите родительскую категорию</option>
                @foreach ($sectors as $sector)
                <option value="{{ $sector->id }}" @if ($category->sector_id == $sector->id) selected @endif>
                    {{ $sector->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="icon" class="form-label mb-3">Выберите картнику для продукта</label>
            <input class="form-control" type="file" id="icon" name="icon">
            <div class="my-3">
                <div class="img-block mb-2" style="width: 80px">
                    {!! $category->getImage() !!}
                </div>
                @if ($category->icon)
                    <a href="{{ route('admin.categories.removeImage', $category) }}" class="btn btn-danger btn-sm">Удалить картинку</a>
                @endif
            </div>
        </div>

        <button class="btn btn-primary">Изменить</button>
    </form>
@endsection
