@extends('layouts.admin')

@section('title', 'Подкатегории')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-3">Подкатегории</h2>
    <a href="{{ route('category.create') }}" class="btn btn-success">Добавить</a>
</div>

@if ($categories->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>Картинка</th>
            <th>Название</th>
            <th>Сектор</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{!! $category->getImage() !!}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->sector->name }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('category.edit', $category) }}" class="btn btn-warning btn-sm" style="margin-right: 5px">Ред.</a>
                    <form action="{{ route('category.destroy', $category) }}" method="POST">
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
    <h4>К сожалению пока что нет ни одной подкатегории</h4>
</div>
@endif

@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Подкатегория будет удалена. Продолжить?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
