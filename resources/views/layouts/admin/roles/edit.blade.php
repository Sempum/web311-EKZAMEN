@extends('layouts.admin')

@section('title', $role->name . ' (ред.)')

@section('content')
    <h1 class="mb-3">{{ $role->name . ' (ред)'}}</h1>

    <form action="{{ route('roles.update', $role) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Название роли *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        @if ($permissions->count())
            <h6>Разрешения</h6>
            <div class="mb-3">
                @foreach ($permissions as $permission)
                    <div class="form-check form-check-inline">
                        <input name="permissions[]" class="form-check-input" type="checkbox" id="permission_{{ $permission->id }}" value="{{ $permission->name }}" @if ($role->permissions->contains($permission->id)) checked @endif>
                        <label class="form-check-label" for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endif

        <button class="btn btn-primary">Изменить</button>
    </form>
@endsection
