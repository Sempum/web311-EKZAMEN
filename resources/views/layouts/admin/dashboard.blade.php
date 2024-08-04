@extends('layouts.admin')

@section('title', 'Активные жалобы')

@section('content')
<h2 class="mb-3">Жалобы</h2>

@if ($reports->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>Имя Пользователя</th>
            <th>Email</th>
            <th>Причина жалобы</th>
            <th>Текст обрашения</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
        <tr>
            <td>{{ $report->name }}</td>
            <td>{{ $report->email }}</td>
            <td>{{ $report->topic }}</td>
            <td>{{ $report->message }}</td>
            <td>
                <form action="{{ route('report.fix', $report) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-success btn-sm deleteBtn">Исправил</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="my-5">
    <h4>Нет активных обращений</h4>
</div>
@endif
@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Вы точно исправили проблему?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
