@extends('layouts.admin')

@section('title', $sector->name . ' (ред.)')

@section('content')
    <h1 class="mb-3">{{ $sector->name . ' (ред.)' }} </h1>

    <form action="{{ route('sector.update', $sector) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Название категории *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $sector->name) }}">
        </div>

        <button class="btn btn-primary">Изменить</button>
    </form>
@endsection
