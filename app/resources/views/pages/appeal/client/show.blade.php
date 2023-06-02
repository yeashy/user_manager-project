@php
    $isNew = is_null($appeal ?? null);
@endphp

@extends('layouts.default')

@section('title', 'Обращение')

@section('content')
    <div class="container">
        @include('partials.appeal.client.appeal-data')
    </div>
@endsection
