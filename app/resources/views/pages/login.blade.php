@extends('layouts.default')

@section('title', "Зарегистрироваться")

@section('content')
    <div class="container">
        <form action="{{ route('auth.login.perform') }}" method="post">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Войти</h4>
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="email" class="form-control" id="email" placeholder="example@email.com" name="email" required>
                        <label for="email" class="form-label">E-mail</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Пароль" name="password" required>
                        <label for="password" class="form-label">Пароль</label>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Войти</button>
                    <a href="/auth/register" class="btn btn-secondary">Зарегистрироваться</a>
                </div>
            </div>
        </form>
    </div>
@endsection
