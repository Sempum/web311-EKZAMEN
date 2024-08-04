@extends('layouts.admin')

@section('title', 'Документация')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-3">Документация</h2>
    <a href="{{ route('documents.create') }}" class="btn btn-success">Добавить</a>
</div>

@if ($documents->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Название</th>
            <th>Продукт</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($documents as $document)
        <tr>
            <td>{{ $document->id }}</td>
            <td><a href="{{ asset('uploads/' . $document->file) }}">{{ $document->name }}</a></td>
            <td>{{ $document->product->name }}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('documents.edit', $document) }}" class="btn btn-warning btn-sm" style="margin-right: 5px">Ред.</a>
                    <form action="{{ route('documents.destroy', $document) }}" method="POST" style="margin-right: 5px">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm deleteBtn">Удалить</button>
                    </form>

                    @if ($document->approved != 1)
                    <form action="{{ route('admin.approveDoc', $document) }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm approveBtn">Одобрить</button>
                    </form>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="my-5">
    <h4>К сожалению пока что нет ни одной документации</h4>
</div>
@endif

@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Документация будет удален. Продолжить?')){
            $this.closest('form').submit();
        }
    })

    $('.approveBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Документация будет одобренна. Продолжить?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
