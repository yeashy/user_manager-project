@extends('layouts.default')

@section('title', 'Мои обращения')

@section('content')
    <div class="container">
        <div class="btns-wrapper d-flex w-100 justify-content-end mb-3">
            <a href="/appeals/create" class="btn btn-primary">Создать обращение</a>
        </div>

        @forelse($appeals as $appeal)
            <div class="card">
                <div class="card-title">
                    {{ $appeal->subject }}
                </div>
            </div>
        @empty
            <div class="card shadow">
                <div class="card-body ">
                    <h4 class="card-title">У вас пока нет обращений.</h4>
                </div>
            </div>
        @endforelse
    </div>
@endsection
