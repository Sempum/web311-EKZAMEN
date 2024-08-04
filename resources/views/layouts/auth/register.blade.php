@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

<div class="container my-3 auth">
    <h1 class="mb-3">Регистрация</h1>

    <form action="{{ route('auth.register') }}" method="POST">
        @csrf <!-- csrf token -->

        <input type="hidden" name="secret" value="{{ $captcha->id }}">

        <div class="form-group mb-3">
            <label for="name">Логин *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email *</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">Пароль *</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="repeat_password">Повтор пароля *</label>
            <input type="password" name="repeat_password" class="form-control">
            @error('repeat_password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="captcha">Введите код с картинки *</label>
            <input type="captcha" name="captcha" class="form-control" id="captcha" data-id="{{ $captcha->id }}">
            <br>
            <img src="{{ asset($captcha->image_path) }}" alt="#">
        </div>

        <button class="btn btn-primary" id="sendBtn">Зарегистрироваться</button>
    </form>
</div>
@endsection

@section('page-script')
<script>

    $('#sendBtn').on('click', function (e){
        e.preventDefault();

        let form = $(this).closest('form');
        let captchaInput = $('#captcha');
        let url = window.location.origin + '/ajax/getCaptchaCode/' + captchaInput.data('id');


        $.ajax({
            method: "GET",
            url: url,
            contentType: "application/json",
            success: function(res) {

                if (res.captchaCode === captchaInput.val()) {
                    form.submit();
                } else {
                    window.location.reload(true);
                };
            }
        });
    })

</script>
@endsection
