@php
    $isNew = is_null($appeal ?? null);
@endphp

@extends('layouts.default')

@section('title', 'Обращение')

@section('content')
    <div class="container">
        <form action="@if($isNew){{ route('appeals.create') }}@else/appeals/{{$appeal->id }}@endif" method="post">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">@if($isNew)Создать@elseРедактировать@endif обращение</h4>
                    @csrf
                    @if(!$isNew)
                        @method('PUT')
                    @endif
                    <div class="mb-3 form-floating">
                        <input
                            type="text"
                            class="form-control"
                            id="subject"
                            placeholder="Тема письма"
                            name="subject"
                            required
                            value="{{ $isNew ? old('subject') : $appeal->subject }}">
                        <label for="subject">Тема письма</label>
                        @if($errors->has('subject'))
                            <span class="text-danger text-left">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea
                            class="form-control"
                            placeholder="Введите текст обращения..."
                            id="text"
                            name="text"
                            style="height: 100px">{{$isNew ? old('text') : $appeal->text}}</textarea>
                        <label for="text">Текст обращения</label>
                        @if($errors->has('text'))
                            <span class="text-danger text-left">{{ $errors->first('text') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 form-floating">
                        <input
                            type="email"
                            class="form-control"
                            id="email_to"
                            placeholder="example@email.com"
                            name="email_to"
                            required
                            value="{{$isNew ? old('email_to') : $appeal->email_to}}">
                        <label for="email_to">E-mail, на который отправить ответ</label>
                        @if($errors->has('email_to'))
                            <span class="text-danger text-left">{{ $errors->first('email_to') }}</span>
                        @endif
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-success">@if($isNew)Создать@elseРедактировать@endif</button>
                    </div>
                    <a href="/appeals" class="btn btn-secondary">Вернуться к списку</a>
                </div>
            </div>
        </form>
        @if(!$isNew)
            <form action="/appeals/{{$appeal->id}}" method="post" class="mt-3 d-flex justify-content-end w-100">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        @endif
    </div>
@endsection
