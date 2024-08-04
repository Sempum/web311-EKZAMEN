@extends('layouts.admin')

@section('title', 'Категории')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-3">Категории</h2>
    <a href="{{ route('sector.create') }}" class="btn btn-success">Добавить</a>
</div>

@if ($sectors->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Лэйбл</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sectors as $sector)
        <tr>
            <td>{{ $sector->id }}</td>
            <td>{{ $sector->name }}</td>
            <td>{{ $sector->slug }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('sector.edit', $sector) }}" class="btn btn-warning btn-sm" style="margin-right: 5px">Ред.</a>
                    <form action="{{ route('sector.destroy', $sector) }}" method="POST">
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
    <h4>К сожалению пока что нет ни одной категории</h4>
</div>
@endif

@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Категория будет удалена. Продолжить?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
