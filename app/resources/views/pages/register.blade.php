@extends('layouts.default')

@section('title', "Зарегистрироваться")

@section('content')
    <div class="container">
        <form action="{{ route('auth.register') }}" method="post">
            <div class="card card-body">
                <h4 class="card-title">Зарегистрироваться</h4>
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" placeholder="Иван" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="example@email.com" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="repeat-password" class="form-label">Повторите пароль</label>
                    <input type="password" class="form-control" id="repeat-password" name="repeat-password" required>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                <a href="/login" class="btn btn-secondary">Войти</a>
            </div>
        </form>
    </div>
@endsection
