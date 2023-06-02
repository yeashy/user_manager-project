@extends('layouts.default')

@section('title', 'Обращение')

@section('content')
    <div class="container">
        @include('partials.appeal.manager.answer-data')
        @include('partials.appeal.manager.appeal-data')
    </div>
@endsection
