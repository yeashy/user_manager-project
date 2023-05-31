@extends('layouts.default')

@section('title', "Зарегистрироваться")

@section('content')
    <div class="container">
        <form action="{{ route('auth.login') }}" method="post">
            <div class="card card-body">
                <h4 class="card-title">Войти</h4>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="example@email.com" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Войти</button>
                <a href="/register" class="btn btn-secondary">Зарегистрироваться</a>
            </div>
        </form>
    </div>
@endsection
