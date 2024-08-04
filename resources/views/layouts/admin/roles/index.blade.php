@extends('layouts.admin')

@section('title', 'Роли')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-3">Роли</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-success">Добавить</a>
</div>

@if ($roles->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Права</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>
                @if ($role->permissions->count())
                    @foreach ($role->permissions as $perm)
                        {{ $perm->name }}<br>
                    @endforeach
                @endif
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm" style="margin-right: 5px">Ред.</a>
                    <form action="{{ route('roles.destroy', $role) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm deleteBtn">Удалить</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="my-5">
    <h4>К сожалению пока что нет ни одной роли</h4>
</div>
@endif

@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Роль будет удален. Продолжить?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
