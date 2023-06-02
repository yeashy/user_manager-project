@extends('layouts.default')

@section('title', 'Мои обращения')

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

        <div class="btns-wrapper d-flex w-100 justify-content-end mb-3">
            <a href="/appeals/create" class="btn btn-primary">Создать обращение</a>
        </div>

        @forelse($appeals as $appeal)
            <div class="card p-2 mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-2 d-flex">
                        {{$appeal->subject}}
                    </h5>
                    <p class="mb-0 text-muted">
                       {{substr($appeal->text, 0, 100)}}@if(strlen($appeal->text) > 100)...@endif
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/appeals/{{$appeal->id}}" class="btn btn-success">Редактировать</a>
                    <form action="/appeals/{{$appeal->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="card shadow">
                <div class="card-body ">
                    <h4 class="card-title">У вас пока нет обращений.</h4>
                </div>
            </div>
        @endforelse

        @if($totalPages > 1)
            <nav>
                <ul class="pagination d-flex justify-content-center">
                    @foreach(range($currentPage - 2, $currentPage + 2) as $page)
                        @if($page <= 0 || $page > $totalPages)
                            @continue
                        @endif
                        <li class="page-item @if($page === $currentPage)disabled @endif">
                            <a href="/appeals?page={{$page}}" class="page-link disabled">
                                {{$page}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        @endif
    </div>
@endsection
