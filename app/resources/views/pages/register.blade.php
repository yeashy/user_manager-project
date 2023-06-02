@extends('layouts.default')

@section('title', "Зарегистрироваться")

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('auth.register.perform') }}">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Зарегистрироваться</h4>
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="name" placeholder="Иван" name="name" required value="{{ old('name') }}">
                        <label for="name" class="form-label">Имя</label>
                        @if($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" class="form-control" id="email" placeholder="example@email.com" name="email" required value="{{ old('email') }}">
                        <label for="email" class="form-label">E-mail</label>
                        @if($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Пароль" name="password" required>
                        <label for="password" class="form-label">Пароль</label>
                        @if($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Пароль" name="password_confirmation" required>
                        <label for="password_confirmation" class="form-label">Повторите пароль</label>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                    <a href="/auth/login" class="btn btn-secondary">Войти</a>
                </div>
            </div>
        </form>
    </div>
@endsection
