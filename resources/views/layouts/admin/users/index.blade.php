@extends('layouts.admin')

@section('title', 'Пользователи')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-3">Пользователи</h2>
    <a href="{{ route('users.create') }}" class="btn btn-success">Добавить</a>
</div>

@if ($users->count())
<table class="table table-striped">
    <thead>
        <tr>
            <th>Логин</th>
            <th>Email</th>
            <th>Роли</th>
            <th>Права</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->getRoles() }}</td>
            <td>{!! $user->getPerms() !!}</td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm" style="margin-right: 5px">Ред.</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="margin-right: 5px">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm deleteBtn">Удалить</button>
                    </form>
                    @if ($user->id != auth()->user()->id)


                    @if ($user->banned_till == null)
                    <form action="{{ route('admin.ban.user', $user) }}" method="POST">
                        @csrf
                        <button class="btn btn-info btn-sm banBtn">Заблокировать</button>
                    </form>
                    @else
                    <form action="{{ route('admin.unban.user', $user) }}" method="POST">
                        @csrf
                        <button class="btn btn-info btn-sm banBtn">Разблокировать</button>
                    </form>
                    @endif

                    @endif

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="my-5">
    <h4>К сожалению пока что нет ни одного пользователя</h4>
</div>
@endif

@endsection

@section('page-script')
<script>
    $('.deleteBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Пользователь будет удален. Продолжить?')){
            $this.closest('form').submit();
        }
    })

    $('.banBtn').on('click', function(e){
        e.preventDefault();

        let $this = $(this);
        if(confirm('Пользователь будет разблокирован. Продолжить?')){
            $this.closest('form').submit();
        }
    })
</script>
@endsection
