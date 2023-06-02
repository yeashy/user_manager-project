@extends('layouts.default')

@section('title', 'Обращения клиентов')

@section('content')
    <div class="container">
        @if($message)
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        @if($error)
            <div class="alert alert-success">
                {{ $error }}
            </div>
        @endif

        @include('partials.appeal.manager.filters')

        @forelse($appeals as $appeal)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-2 d-flex">
                        {{$appeal->subject}}
                    </h5>
                    <p class="mb-0 text-muted">
                        {{substr($appeal->text, 0, 100)}}@if(strlen($appeal->text) > 100)...@endif
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="/client-appeals/{{$appeal->id}}" class="btn btn-success">@if($appeal->is_answered)Посмотреть ответ@elseОтветить@endif</a>
                    <span class="text-secondary">{{$appeal->created_at}}</span>
                </div>
            </div>
        @empty
            <div class="card shadow">
                <div class="card-body ">
                    <h4 class="card-title">Обращений нет.</h4>
                </div>
            </div>
        @endforelse

        @include('partials.pagination')
    </div>
@endsection
