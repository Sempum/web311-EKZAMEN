@extends('layouts.admin')

@section('title', 'Разрешения')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="title mb-3">Разрешения</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-success">Добавить</a>
</div>

@if ($permissions->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning btn-sm" style="margin-right: 5px">Ред.</a>
                <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
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
<h4 class="my-4">К сожалению пока, что нет ни одного разрешения</h4>
@endif

@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();

        let $this = $(this);
        if(confirm('Разрешение будет удалена. Продолжить?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
