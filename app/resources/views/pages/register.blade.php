@extends('layouts.default')

@section('title', "Зарегистрироваться")

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('auth.register.perform') }}">
            <div class="card card-body">
                <h4 class="card-title">Зарегистрироваться</h4>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" placeholder="Иван" name="name" required value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="example@email.com" name="email" required value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @if($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Повторите пароль</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                <a href="/auth/login" class="btn btn-secondary">Войти</a>
            </div>
        </form>
    </div>
@endsection
