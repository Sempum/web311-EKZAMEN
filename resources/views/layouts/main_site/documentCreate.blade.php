@extends('layouts.app')

@section('title', 'Новая Документация')

@section('content')
<div class="container my-3">
    @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! Session::get('error') !!}</li>
        </ul>
    </div>
    @endif

    <h3>Добавление документации</h3>

    <form action="{{ route('app.doc.store') }}" method="POST" enctype="multipart/form-data">
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
            <textarea rows="3" class="form-control" name="description" aria-label="With textarea">
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
</div>
@endsection

