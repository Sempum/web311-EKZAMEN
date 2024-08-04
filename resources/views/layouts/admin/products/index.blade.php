@extends('layouts.admin')

@section('title', 'Продукты')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-3">Продукты</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success">Добавить</a>
</div>

@if ($products->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>Картинка</th>
            <th>Название</th>
            <th>Подкатегория</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>
                <div class="img" style="width: 80px">
                    {!! $product->getImage() !!}
                </div>
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm" style="margin-right: 5px">Ред.</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
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
    <h4>К сожалению пока что нет ни одного продукта</h4>
</div>
@endif

@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Продукт будет удален. Продолжить?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
