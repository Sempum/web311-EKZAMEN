@extends('layouts.admin')

@section('title', $user->name . ' (ред)')

@section('content')
    <h2 class="title mb-3">{{ $user->name . ' (ред)' }}</h2>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Логин *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">Email *</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        @if ($roles->count())
            <h6>Роли</h6>
            <div class="mb-3">
                @if (auth()->user()->hasRole('admin') && auth()->user()->id === $user->id)
                    <input name="roles[]" type="checkbox" value="admin" checked style="display: none">
                @endif

                @if (auth()->user()->id !== $user->id)
                    <div class="form-check form-check-inline">
                        <input name="roles[]" class="form-check-input" type="checkbox" id="role_{{ $adminRole->id }}" value="{{ $adminRole->name }}">
                        <label class="form-check-label" for="role_{{ $adminRole->id }}">
                            {{ $adminRole->name }}
                        </label>
                    </div>
                @endif

                @foreach ($roles->except($adminRole->id) as $role)
                    <div class="form-check form-check-inline">
                        <input name="roles[]" class="form-check-input" type="checkbox" id="role_{{ $role->id }}" value="{{ $role->name }}" @if ($user->roles->contains($role->id)) checked @endif>
                        <label class="form-check-label" for="role_{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($permissions->count())
            <h6>Разрешения</h6>
            <div class="mb-3">
                @foreach ($permissions as $permission)
                    <div class="form-check form-check-inline">
                        <input name="permissions[]" class="form-check-input" type="checkbox" id="permission_{{ $permission->id }}" value="{{ $permission->name }}" @if ($user->permissions->contains($permission->id)) checked @endif>
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
